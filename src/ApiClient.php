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
use GraphQL\RawObject;
use Oberon\TravelbaseClient\Exception\BadResponseException;
use Oberon\TravelbaseClient\Model\Accommodation;
use Oberon\TravelbaseClient\Model\Activity;
use Oberon\TravelbaseClient\Model\Allotment;
use Oberon\TravelbaseClient\Model\AllotmentCollection;
use Oberon\TravelbaseClient\Model\Booking;
use Oberon\TravelbaseClient\Model\BookingConnection;
use Oberon\TravelbaseClient\Model\Company;
use Oberon\TravelbaseClient\Model\DatePricing;
use Oberon\TravelbaseClient\Model\DatePricingCollection;
use Oberon\TravelbaseClient\Model\DatePricingModifier;
use Oberon\TravelbaseClient\Model\Partner;
use Oberon\TravelbaseClient\Model\RentalUnit;
use Oberon\TravelbaseClient\Model\Ticket;
use Oberon\TravelbaseClient\Model\TicketConnection;
use Oberon\TravelbaseClient\Model\TimeslotInput;
use Oberon\TravelbaseClient\Model\TripPricing;
use Oberon\TravelbaseClient\Model\TripPricingCollection;
use Oberon\TravelbaseClient\Model\TimeslotCollection;
use Oberon\TravelbaseClient\Model\DeleteActivityTimeslotsCollection;
use Oberon\TravelbaseClient\Query\QueryBuilder;
use Oberon\TravelbaseClient\Response\AccommodationCallResponseBody;
use Oberon\TravelbaseClient\Response\ActivityCallResponseBody;
use Oberon\TravelbaseClient\Response\BookingCallResponseBody;
use Oberon\TravelbaseClient\Response\CreateDatePricingModifierCallResponseBody;
use Oberon\TravelbaseClient\Response\CreateOrReplaceActivityTimeslotsCallResponseBody;
use Oberon\TravelbaseClient\Response\CreateOrReplaceDatePricingsCallResponseBody;
use Oberon\TravelbaseClient\Response\DeleteActivityTimeslotsCallResponseBody;
use Oberon\TravelbaseClient\Response\CompanyCallResponseBody;
use Oberon\TravelbaseClient\Response\CompletePendingBookingCallResponseBody;
use Oberon\TravelbaseClient\Response\CreateOrReplaceAllotmentsCallResponseBody;
use Oberon\TravelbaseClient\Response\CreateOrReplaceTripPricingsCallResponseBody;
use Oberon\TravelbaseClient\Response\DeleteDatePricingModifierCallResponseBody;
use Oberon\TravelbaseClient\Response\DeleteDatePricingsCallResponseBody;
use Oberon\TravelbaseClient\Response\DeleteTripPricingsCallResponseBody;
use Oberon\TravelbaseClient\Response\EditDatePricingModifierCallResponseBody;
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

    /** @var string */
    private $locale;

    /** @var QueryBuilder */
    private $queryBuilder;

    public function __construct(string $endPoint, string $apiKey, string $locale = 'nl')
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
        $this->queryBuilder = new QueryBuilder($locale);
        $this->locale = $locale;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;
        $this->queryBuilder->setLocale($locale);

        return $this;
    }

    public function getPartners(): array
    {
        $query = $this->queryBuilder->createPartnersQuery();

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnersCallResponseBody::class)->getData()->getPartners();
    }

    public function getPartner(string $partnerId): Partner
    {
        $query = $this->queryBuilder->createPartnerQuery($partnerId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerCallResponseBody::class)->getData()->getPartner();
    }

    public function getUpdatedBookings(string $partnerId, DateTimeInterface $updatedSince): array
    {
        $query = $this->queryBuilder->createUpdatedBookingsQuery($partnerId, $updatedSince);

        $result = $this->runQuery($query);

        return $this->parseResult($result, PartnerUpdatedBookingsCallResponseBody::class)
            ->getData()->getPartner()->getUpdatedBookings();
    }

    public function getAllBookings(
        string $partnerId,
        int $limit = 10,
        string $cursor = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $searchQuery = null,
        ?array $rentalUnitIds = []
    ): BookingConnection {
        $query = $this->queryBuilder->createAllBookingsQuery(
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

    public function getBooking(string $bookingId): Booking
    {
        $query = $this->queryBuilder->createBookingQuery($bookingId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, BookingCallResponseBody::class)->getData()->getBooking();
    }

    public function getAccommodation(string $accommodationId): Accommodation
    {
        $query = $this->queryBuilder->createAccommodationQuery($accommodationId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, AccommodationCallResponseBody::class)->getData()->getAccommodation();
    }

    public function getRentalUnit(string $rentalUnitId): RentalUnit
    {
        $query = $this->queryBuilder->createRentalUnitQuery($rentalUnitId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, RentalUnitCallResponseBody::class)->getData()->getRentalUnit();
    }


    public function getCompany(string $companyId): Company
    {
        $query = $this->queryBuilder->createCompanyQuery($companyId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, CompanyCallResponseBody::class)->getData()->getCompany();
    }

    public function getActivity(string $activity): Activity
    {
        $query = $this->queryBuilder->createActivityQuery($activity);

        $result = $this->runQuery($query);

        return $this->parseResult($result, ActivityCallResponseBody::class)->getData()->getActivity();
    }

    public function getTicket(string $ticketId): Ticket
    {
        $query = $this->queryBuilder->createTicketQuery($ticketId);

        $result = $this->runQuery($query);

        return $this->parseResult($result, TicketCallResponseBody::class)->getData()->getTicket();
    }

    public function getAllTickets(
        string $partnerId,
        int $limit = 10,
        string $cursor = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $timeslotId = null,
        ?string $externalTimeslotId = null,
        ?array $activityIds = [],
        ?string $companyId = null
    ): TicketConnection {
        $query = $this->queryBuilder->createAllTicketsQuery(
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

    public function createOrReplaceAllotments(string $rentalUnitId, array $allotmentCollection): AllotmentCollection
    {
        $normalizedAllotmentCollection = [];
        foreach ($allotmentCollection as $allotment) {
            if ($allotment instanceof Allotment) {
                $normalizedAllotmentCollection[] = $allotment->toArray();
            } elseif (is_array($allotment)) {
                $normalizedAllotmentCollection[] = $allotment;
            }
        }

        $mutation = $this->queryBuilder->createCreateOrUpdateAllotmentsMutation();

        $variables = ['input' => ['rentalUnitId' => $rentalUnitId, 'allotments' => $normalizedAllotmentCollection]];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, CreateOrReplaceAllotmentsCallResponseBody::class)
            ->getData()->getCreateOrReplaceAllotments();
    }

    public function createOrReplaceTripPricings(string $rentalUnitId, array $tripPricingCollection): TripPricingCollection
    {
        $normalizedTripPricingCollection = [];
        foreach ($tripPricingCollection as $tripPricing) {
            if ($tripPricing instanceof TripPricing) {
                $normalizedTripPricingCollection[] = $tripPricing->toArray();
            } elseif (is_array($tripPricing)) {
                $normalizedTripPricingCollection[] = $tripPricing;
            }
        }

        $mutation = $this->queryBuilder->createCreateOrUpdateTripPricingsMutation();
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

    // region Date pricing
    public function createOrReplaceDatePricings(
        string $rentalUnitId,
        DatePricingCollection $datePricingCollection
    ): DatePricingCollection
    {
        $normalizedDatePricingCollection = [];
        foreach ($datePricingCollection as $datePricing) {
            if ($datePricing instanceof DatePricing) {
                $normalizedDatePricingCollection[] = $datePricing->toArray();
            } elseif (is_array($datePricing)) {
                $normalizedDatePricingCollection[] = $datePricing;
            }
        }

        $mutation = $this->queryBuilder->createCreateOrReplaceDatePricingsMutation();
        $variables = [
            'input' => [
                'rentalUnitId' => $rentalUnitId,
                'datePricings' => $normalizedDatePricingCollection,
            ],
        ];
        $result = $this->runQuery($mutation, $variables);

        /** @var CreateOrReplaceDatePricingsCallResponseBody $response */
        $response = $this->parseResult($result, CreateOrReplaceDatePricingsCallResponseBody::class);
        return $response->getData()->getCreateOrReplaceDatePricings();
    }

    public function deleteDatePricings(
        string $rentalUnitId,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate
    ): string
    {
        $mutation = $this->queryBuilder->createDeleteDatePricingsMutation();

        $variables = [
            'input' => [
                'rentalUnitId' => $rentalUnitId,
                'startDate' => $startDate,
                'endDate' => $endDate
            ]
        ];
        $result = $this->runQuery($mutation, $variables);

        /** @var DeleteDatePricingsCallResponseBody $response */
        $response = $this->parseResult($result, DeleteDatePricingsCallResponseBody::class);
        return $response->getData()->getDeleteDatePricings()->getMessage();
    }

    public function createDatePricingModifier(
        string $rentalUnitId,
        DatePricingModifier $datePricingModifier
    )
    {
        $mutation = $this->queryBuilder->createCreateDatePricingModifierMutation();
        $variables = array_merge(
            [
                'input' => [
                    'rentalUnitId' => $rentalUnitId
                ],
            ],
            $datePricingModifier->toArray()
        );
        $result = $this->runQuery($mutation, $variables);

        /** @var CreateDatePricingModifierCallResponseBody $response */
        $response = $this->parseResult($result, CreateDatePricingModifierCallResponseBody::class);
        return $response->getData()->getCreateDatePricingModifier();
    }

    public function editDatePricingModifier(
        int $datePricingModifierId,
        DatePricingModifier $datePricingModifier
    )
    {
        $mutation = $this->queryBuilder->createEditDatePricingModifierMutation();
        $variables = array_merge(
            [
                'input' => [
                    'datePricingModifierId' => $datePricingModifierId
                ],
            ],
            $datePricingModifier->toArray()
        );
        $result = $this->runQuery($mutation, $variables);

        /** @var EditDatePricingModifierCallResponseBody $response */
        $response = $this->parseResult($result, EditDatePricingModifierCallResponseBody::class);
        return $response->getData()->getEditDatePricingModifier();
    }

    public function deleteDatePricingModifier(int $datePricingModifierId): int
    {
        $mutation = $this->queryBuilder->createDeleteDatePricingModifierMutation();

        $variables = [
            'input' => [
                'datePricingModifierId' => $datePricingModifierId
            ]
        ];
        $result = $this->runQuery($mutation, $variables);

        /** @var DeleteDatePricingModifierCallResponseBody $response */
        $response = $this->parseResult($result, DeleteDatePricingModifierCallResponseBody::class);
        return $response->getData()->getId();
    }
    // endregion Date pricing

    public function deleteActivityTimeslots(string $activityId, DateTimeInterface $startDateTime, DateTimeInterface $endDateTime, string $errorResolution): DeleteActivityTimeslotsCollection
    {
        $arguments = ['activityId' => $activityId, 'startDateTime' => $startDateTime->format(DATE_ISO8601), 'endDateTime' => $endDateTime->format(DATE_ISO8601), 'errorResolution' => $errorResolution];

        $mutation = $this->queryBuilder->createDeleteActivityTimeslotsMutation();

        $variables = ['input' => $arguments];
        $result = $this->runQuery($mutation, $variables);

        $parsed = $this->parseResult($result, DeleteActivityTimeslotsCallResponseBody::class)
            ->getData()->getDeleteActivityTimeslots();

        return new DeleteActivityTimeslotsCollection($parsed['deletedCount'],$parsed['errorCount']);
    }

    public function createOrReplaceActivityTimeslots(
        string $activityId,
        array $timeslots
    ): TimeslotCollection {
        $normalizedTimeslots = [];
        foreach ($timeslots as $timeslot) {
            if ($timeslot instanceof TimeslotInput) {
                $normalizedTimeslots[] = $timeslot->toArray();
            } elseif (is_array($timeslot)) {
                $normalizedTimeslots[] = $timeslot;
            }
        }

        $mutation = $this->queryBuilder->createCreateOrReplaceActivityTimeslotsMutation();
        $variables = [
            'input' => [
                'activityId' => $activityId,
                'timeslots' => $normalizedTimeslots,
            ],
        ];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, CreateOrReplaceActivityTimeslotsCallResponseBody::class)
            ->getData()->getCreateOrReplaceActivityTimeslots();
    }

    public function deleteTrips(string $rentalUnitId, ?DateTimeInterface $date = null, ?int $duration = null): ?string
    {
        $arguments = ['rentalUnitId' => $rentalUnitId];
        if ($date) {
            $arguments['date'] = $date->format('Y-m-d');
        }
        if ($duration !== null) {
            $arguments['duration'] = $duration;
        }

        $mutation = $this->queryBuilder->createDeleteTripsMutation();

        $variables = ['input' => $arguments];
        $result = $this->runQuery($mutation, $variables);

        return $this->parseResult($result, DeleteTripPricingsCallResponseBody::class)
            ->getData()->getDeleteTripPricings()->getMessage();
    }

    public function completePendingBooking(string $bookingId, bool $accept): Booking
    {
        $arguments = ['bookingId' => $bookingId, 'accept' => $accept];
        $mutation = $this->queryBuilder->createCompletePendingBookingMutation();
        $variables = ['input' => $arguments];
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
