<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL;

use GraphQL\Client;
use GraphQL\Query;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use TOR\GraphQL\Exception\NotFoundException;
use TOR\GraphQL\Model\Accommodation;
use TOR\GraphQL\Model\AllotmentCollection;
use TOR\GraphQL\Model\BookingRelay;
use TOR\GraphQL\Model\Partner;
use TOR\GraphQL\Model\RentalUnit;
use TOR\GraphQL\Model\TripPricingCollection;
use TOR\GraphQL\Query\MutationBuilder;
use TOR\GraphQL\Query\QueryBuilder;
use TOR\GraphQL\Response\AccommodationCallResponseBody;
use TOR\GraphQL\Response\CreateOrReplaceAllotmentsCallResponseBody;
use TOR\GraphQL\Response\CreateOrReplaceTripPricingsCallResponseBody;
use TOR\GraphQL\Response\DeleteTripsCallResponseBody;
use TOR\GraphQL\Response\GraphQLCallResponseBodyInterface;
use TOR\GraphQL\Response\PartnerBookingCallResponseBody;
use TOR\GraphQL\Response\PartnerCallResponseBody;
use TOR\GraphQL\Response\PartnersCallResponseBody;
use \DateTimeInterface;

class TorClient
{
    /** @var Client */
    private $client;

    /** @var Serializer  */
    private $serializer;

    public function __construct(?string $endPoint = null, ?string $apiKey = null)
    {
        $endPointEnvVariable = getenv('TOR_GRAPHQL_ENDPOINT');
        $apiKeyEnvVariable = getenv('TOR_GRAPHQL_APIKEY');

        $apiKey = $apiKey ?? $apiKeyEnvVariable;
        $endPoint = $endPoint ?? $endPointEnvVariable;

        if (!$endPoint) {
            throw new NotFoundException('Endpoint not defined');
        }

        if (!$apiKey) {
            throw new NotFoundException('Api key not defined');
        }
        $this->client = new Client($endPoint, ['Authorization' => "Bearer $apiKey"]);

        $encoders = [new JsonEncoder()];
        $normalizers = [
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor())
        ];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function getPartners(): array
    {
        $query = QueryBuilder::createPartnersQuery();

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnersCallResponseBody::class)->getData()->getPartners();
    }

    public function getPartner(int $partnerId): Partner
    {
        $query = QueryBuilder::createPartnerQuery($partnerId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerCallResponseBody::class)->getData()->getPartner();
    }

    public function getUpcomingBookings(int $partnerId, int $limit = 10, ?string $cursor = null): BookingRelay
    {
        $query = QueryBuilder::createUpcomingBookingsQuery($partnerId, $limit, $cursor);

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerBookingCallResponseBody::class)->getData()->getPartner()->getUpcomingBookings();
    }

    public function getRecentlyUpdatedBookings(int $partnerId, int $limit = 10, ?string $cursor = null): BookingRelay
    {
        $query = QueryBuilder::createRecentlyUpdatedBookingsQuery($partnerId, $limit, $cursor);

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerBookingCallResponseBody::class)->getData()->getPartner()->getRecentlyUpdatedBookings();
    }

    public function getAllBookings(
        int $partnerId,
        int $limit = 10,
        string $cursor = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $searchQuery = null,
        ?array $rentalUnitIds = []
    ): BookingRelay {
        $query = QueryBuilder::createAllBookingsQuery($partnerId, $limit, $cursor, $startDate, $endDate, $searchQuery, $rentalUnitIds);

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerBookingCallResponseBody::class)->getData()->getPartner()->getAllBookings();
    }

    public function getAccommodation(int $accommodationId): Accommodation
    {
        $query = QueryBuilder::createAccommodationQuery($accommodationId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, AccommodationCallResponseBody::class)->getData()->getAccommodation();
    }

    public function getRentalUnit(int $rentalUnitId): RentalUnit
    {
        $query = QueryBuilder::createRentalUnitQuery($rentalUnitId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, RentalUnit::class)->getData()->getRentalUnit();
    }

    public function createOrReplaceAllotments(int $rentalUnitId, AllotmentCollection $allotmentCollection): AllotmentCollection
    {
        $mutation = MutationBuilder::createCreateOrUpdateAllotmentsMutation();

        $variables = ['input' => array_merge(['rentalUnitId' => $rentalUnitId],  $allotmentCollection->toArray())];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, CreateOrReplaceAllotmentsCallResponseBody::class)->getData()->getCreateOrReplaceAllotments();
    }

    public function createOrReplaceTripPricings(int $rentalUnitId, TripPricingCollection $tripPricingCollection): TripPricingCollection
    {
        $mutation = MutationBuilder::createCreateOrUpdateTripPricingsMutation();

        $variables = ['input' => array_merge(['rentalUnitId' => $rentalUnitId], $tripPricingCollection->toArray())];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, CreateOrReplaceTripPricingsCallResponseBody::class)->getData()->getCreateOrReplaceTripPricings();
    }

    public function deleteTrips(int $rentalUnitId, ?DateTimeInterface $date = null, ?int $duration = null): ?string
    {
        $arguments = ['rentalUnitId' => $rentalUnitId];
        if ($date) {
            $arguments['date'] = $date->format('Y-m-d');
        }
        if ($duration !== null) {
            $arguments['duration'] = $duration;
        }

        $mutation = MutationBuilder::createDeleteTripsMutation();

        $variables = ['input' => $arguments];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, DeleteTripsCallResponseBody::class)->getData()->getDeleteTrips()->getMessage();
    }

    private function runQuery(Query $query, array $variables = []): string
    {
        try {
            $result = $this->client->runQuery($query, false, $variables);
            if (!$result->getResponseBody()) {
                throw new \Exception('No response body found');
            }
            return $result->getResponseBody();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    private function parseResult(string $data, string $class): GraphQLCallResponseBodyInterface
    {
        return $this->serializer->deserialize($data, $class, 'json');
    }
}
