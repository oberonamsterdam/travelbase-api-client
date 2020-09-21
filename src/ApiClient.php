<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient;

use GraphQL\Client;
use GraphQL\Query;
use Oberon\TorClient\Model\Allotment;
use Oberon\TorClient\Model\TripPricing;
use Oberon\TorClient\Response\RentalUnitCallResponseBody;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Oberon\TorClient\Exception\BadResponseException;
use Oberon\TorClient\Model\Accommodation;
use Oberon\TorClient\Model\AllotmentCollection;
use Oberon\TorClient\Model\BookingConnection;
use Oberon\TorClient\Model\Partner;
use Oberon\TorClient\Model\RentalUnit;
use Oberon\TorClient\Model\TripPricingCollection;
use Oberon\TorClient\Query\MutationBuilder;
use Oberon\TorClient\Query\QueryBuilder;
use Oberon\TorClient\Response\AccommodationCallResponseBody;
use Oberon\TorClient\Response\CreateOrReplaceAllotmentsCallResponseBody;
use Oberon\TorClient\Response\CreateOrReplaceTripPricingsCallResponseBody;
use Oberon\TorClient\Response\DeleteTripPricingsCallResponseBody;
use Oberon\TorClient\Response\GraphQLCallResponseBodyInterface;
use Oberon\TorClient\Response\PartnerBookingCallResponseBody;
use Oberon\TorClient\Response\PartnerCallResponseBody;
use Oberon\TorClient\Response\PartnersCallResponseBody;
use \DateTimeInterface;

class ApiClient
{
    /** @var Client */
    private $client;

    /** @var Serializer  */
    private $serializer;

    CONST API_PATH = '/api/management/v2/graphql/';

    public function __construct(string $endPoint, string $apiKey)
    {
        $parts = parse_url($endPoint);
        $url = $parts['scheme'] . '://' . $parts['host'] . self::API_PATH;

        $this->client = new Client($url, ['Authorization' => "Bearer $apiKey"]);

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

    public function getUpdatedBookings(int $partnerId, DateTimeInterface $updatedSince): array
    {
        $query = QueryBuilder::createUpdatedBookingsQuery($partnerId, $updatedSince);

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerBookingCallResponseBody::class)->getData()->getPartner()->getUpdatedBookings();
    }

    public function getAllBookings(
        int $partnerId,
        int $limit = 10,
        string $cursor = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $searchQuery = null,
        ?array $rentalUnitIds = []
    ): BookingConnection {
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

        return $this->parseResult($result, RentalUnitCallResponseBody::class)->getData()->getRentalUnit();
    }

    /**
     * USAGE
     * createOrReplaceAllotments (
     *      1,
     *      [
     *          [
     *              'date' => '2020-01-01',
     *              'allotments' => 1,
     *          ],
     *          [
     *              'date' => '2020-02-01',
     *              'allotments' => 1,
     *          ]
     *      ];
     * )
     */
    public function createOrReplaceAllotments(int $rentalUnitId, array $allotmentCollection): AllotmentCollection
    {
        $normalizedAllotmentCollection = [];
        foreach ($allotmentCollection as $allotment) {
            if ($allotment instanceof Allotment) {
                $normalizedAllotmentCollection[] = $allotment->toArray();
            } elseif (is_array($allotment)) {
                $normalizedAllotmentCollection[] = $allotment;
            }
        }

        $mutation = MutationBuilder::createCreateOrUpdateAllotmentsMutation();

        $variables = ['input' => ['rentalUnitId' => $rentalUnitId, 'allotments' => $normalizedAllotmentCollection]];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, CreateOrReplaceAllotmentsCallResponseBody::class)->getData()->getCreateOrReplaceAllotments();
    }

    /**
     * USAGE
     * createOrReplaceTripPricings (
     *      1,
     *      [
     *          [
     *              'date' => '2020-01-01',
     *              'duration' => 1,
     *              'price' => 100,
     *          ],
     *          [
     *              'date' => '2020-02-01',
     *              'duration' => 1,
     *              'price' => 100.50,
     *          ]
     *      ];
     * )
     */
    public function createOrReplaceTripPricings(int $rentalUnitId, array $tripPricingCollection): TripPricingCollection
    {
        $normalizedTripPricingCollection = [];
        foreach ($tripPricingCollection as $tripPricing) {
            if ($tripPricing instanceof TripPricing) {
                $normalizedTripPricingCollection[] = $tripPricing->toArray();
            } elseif (is_array($tripPricing)) {
                $normalizedTripPricingCollection[] = $tripPricing;
            }
        }

        $mutation = MutationBuilder::createCreateOrUpdateTripPricingsMutation();
        $variables = [
            'input' => [
                'rentalUnitId' => $rentalUnitId,
                'tripPricings' => $normalizedTripPricingCollection
            ]
        ];

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

        return $this->parseResult($result, DeleteTripPricingsCallResponseBody::class)->getData()->getDeleteTripPricings()->getMessage();
    }

    private function runQuery(Query $query, array $variables = []): string
    {
        $result = $this->client->runQuery($query, false, $variables);
        if (!$result->getResponseBody()) {
            throw new BadResponseException('No response body found');
        }

        return $result->getResponseBody();
    }

    private function parseResult(string $data, string $class): GraphQLCallResponseBodyInterface
    {
        return $this->serializer->deserialize($data, $class, 'json', ['aaa' => 'aaa']);
    }
}
