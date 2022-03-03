<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient;

use DateTimeInterface;
use GraphQL\Client;
use GraphQL\Query;
use Oberon\TravelbaseClient\Exception\BadResponseException;
use Oberon\TravelbaseClient\Model\Accommodation;
use Oberon\TravelbaseClient\Model\Activity;
use Oberon\TravelbaseClient\Model\Allotment;
use Oberon\TravelbaseClient\Model\AllotmentCollection;
use Oberon\TravelbaseClient\Model\Booking;
use Oberon\TravelbaseClient\Model\BookingConnection;
use Oberon\TravelbaseClient\Model\Company;
use Oberon\TravelbaseClient\Model\Partner;
use Oberon\TravelbaseClient\Model\RentalUnit;
use Oberon\TravelbaseClient\Model\Ticket;
use Oberon\TravelbaseClient\Model\TicketConnection;
use Oberon\TravelbaseClient\Model\TimeslotInput;
use Oberon\TravelbaseClient\Model\TripPricing;
use Oberon\TravelbaseClient\Model\TripPricingCollection;
use Oberon\TravelbaseClient\Query\MutationBuilder;
use Oberon\TravelbaseClient\Query\QueryBuilder;
use Oberon\TravelbaseClient\Response\AccommodationCallResponseBody;
use Oberon\TravelbaseClient\Response\ActivityCallResponseBody;
use Oberon\TravelbaseClient\Response\BookingCallResponseBody;
use Oberon\TravelbaseClient\Response\BulkSetActivityTimeslotsCallResponseBody;
use Oberon\TravelbaseClient\Response\CompanyCallResponseBody;
use Oberon\TravelbaseClient\Response\CompletePendingBookingCallResponseBody;
use Oberon\TravelbaseClient\Response\CreateOrReplaceAllotmentsCallResponseBody;
use Oberon\TravelbaseClient\Response\CreateOrReplaceTripPricingsCallResponseBody;
use Oberon\TravelbaseClient\Response\DeleteTripPricingsCallResponseBody;
use Oberon\TravelbaseClient\Response\GraphQLCallResponseBodyInterface;
use Oberon\TravelbaseClient\Response\PartnerCallResponseBody;
use Oberon\TravelbaseClient\Response\PartnerRelayCallResponseBody;
use Oberon\TravelbaseClient\Response\PartnersCallResponseBody;
use Oberon\TravelbaseClient\Response\PartnerUpdatedBookingsCallResponseBody;
use Oberon\TravelbaseClient\Response\RentalUnitCallResponseBody;
use Oberon\TravelbaseClient\Response\TicketCallResponseBody;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiClient
{
    private const API_PATH = '/api/management/v2/graphql/';
    
    /** @var Client */
    private $client;

    /** @var Serializer */
    private $serializer;

    public function __construct(string $endPoint, string $apiKey)
    {
        $parts = parse_url($endPoint);
        $url = $parts['scheme'] . '://' . $parts['host'] . self::API_PATH;

        $this->client = new Client($url, ['Authorization' => "Bearer $apiKey"]);

        $encoders = [new JsonEncoder()];
        $normalizers = [
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
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

        return $this->parseResult($result, PartnerUpdatedBookingsCallResponseBody::class)
            ->getData()->getPartner()->getUpdatedBookings();
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
        $query = QueryBuilder::createAllBookingsQuery(
            $partnerId,
            $limit,
            $cursor,
            $startDate,
            $endDate,
            $searchQuery,
            $rentalUnitIds
        );
        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerRelayCallResponseBody::class)
            ->getData()->getPartner()->getAllBookings();
    }

    public function getBooking(int $bookingId): Booking
    {
        $query = QueryBuilder::createBookingQuery($bookingId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, BookingCallResponseBody::class)->getData()->getBooking();
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


    public function getCompany(int $companyId): Company
    {
        $query = QueryBuilder::createCompanyQuery($companyId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, CompanyCallResponseBody::class)->getData()->getCompany();
    }

    public function getActivity(int $activity): Activity
    {
        $query = QueryBuilder::createActivityQuery($activity);

        $result = $this->runQuery($query);

        return $this->parseResult($result, ActivityCallResponseBody::class)->getData()->getActivity();
    }

    public function getTicket(int $ticketId): Ticket
    {
        $query = QueryBuilder::createTicketQuery($ticketId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, TicketCallResponseBody::class)->getData()->getTicket();
    }

    public function getAllTickets(
        int $partnerId,
        int $limit = 10,
        string $cursor = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $timeslotId = null,
        ?string $externalTimeslotId = null,
        ?array $activityIds = [],
        ?string $companyId = null
    ): TicketConnection {
        $query = QueryBuilder::createAllTicketsQuery(
            $partnerId,
            $limit,
            $cursor,
            $startDate,
            $endDate,
            $timeslotId,
            $externalTimeslotId,
            $activityIds,
            $companyId
        );

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerRelayCallResponseBody::class)
            ->getData()->getPartner()->getAllTickets();
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
     *      ]
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

        return $this->parseResult($result, CreateOrReplaceAllotmentsCallResponseBody::class)
            ->getData()->getCreateOrReplaceAllotments();
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
     *          ],
     *      ]
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
                'tripPricings' => $normalizedTripPricingCollection,
            ],
        ];

        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, CreateOrReplaceTripPricingsCallResponseBody::class)
            ->getData()->getCreateOrReplaceTripPricings();
    }

    /**
     * USAGE
     * bulkSetActivityTimeslots (
     *      1,
     *      new DateTime('2020-01-01'),
     *      new DateTime('2020-02-01'),
     *      [
     *          [
     *              'rateGroupId' => 1,
     *              'startDateTime' => '2020-01-01',
     *              'endDateTime' => '2020-01-02',
     *          ],
     *          [
     *              'rateGroupId' => 1,
     *              'startDateTime' => '2020-01-01',
     *              'endDateTime' => '2020-01-02',
     *          ],
     *      ]
     * )
     */
    public function bulkSetActivityTimeslots(
        int $activityId,
        DateTimeInterface $clearStartDate,
        DateTimeInterface $clearEndDate,
        array $timeslots
    ): Activity {
        $normalizedTimeslots = [];
        foreach ($timeslots as $timeslot) {
            if ($timeslot instanceof TimeslotInput) {
                $normalizedTimeslots[] = $timeslot->toArray();
            } elseif (is_array($timeslot)) {
                $normalizedTimeslots[] = $timeslot;
            }
        }

        $mutation = MutationBuilder::createBulkSetActivityTimeslotsMutation();
        $variables = [
            'input' => [
                'activityId' => $activityId,
                'clearStartDate' => $clearStartDate->format('Y-m-d'),
                'clearEndDate' => $clearEndDate->format('Y-m-d'),
                'timeslots' => $normalizedTimeslots,
            ],
        ];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, BulkSetActivityTimeslotsCallResponseBody::class)
            ->getData()->getBulkSetActivityTimeslots()->getActivity();
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

        return $this->parseResult($result, DeleteTripPricingsCallResponseBody::class)
            ->getData()->getDeleteTripPricings()->getMessage();
    }

    public function completePendingBooking(int $bookingId, bool $accept): Booking
    {
        $arguments = ['bookingId' => $bookingId, 'accept' => $accept];
        $variables = ['input', $arguments];
        $mutation = MutationBuilder::createCompletePendingBookingMutation();

        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, CompletePendingBookingCallResponseBody::class)
            ->getData()->getCompletePendingBooking()->getBooking();
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
        return $this->serializer->deserialize($data, $class, 'json');
    }
}
