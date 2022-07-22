<?php
/**
 * Date: 06-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace Oberon\TravelbaseClient\Query;

use GraphQL\Mutation;
use GraphQL\Query;
use DateTimeInterface;
use GraphQL\Variable;

class QueryBuilder
{
    /** @var string */
    private $locale;

    /**
     * @param string $locale
     */
    public function __construct(string $locale = 'nl')
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return $this
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function createPartnersQuery(): Query
    {
        return (new Query('partners'))->setSelectionSet(
            $this->getPartnerSelectionSet()
        );
    }

    public function createPartnerQuery(string $partnerId): Query
    {
        $query = (new Query('partner'))->setSelectionSet(
            $this->getPartnerSelectionSet()
        );
        $query->setArguments(['id' => $partnerId]);

        return $query;
    }

    public function createAccommodationQuery(string $accommodationId): Query
    {
        $query = (new Query('accommodation'))->setSelectionSet(
            $this->getAccommodationSelectionSet()
        );
        $query->setArguments(['id' => $accommodationId]);

        return $query;
    }

    public function createRentalUnitQuery(string $rentalUnitId): Query
    {
        $query = (new Query('rentalUnit'))->setSelectionSet(
            $this->getRentalUnitSelectionSet()
        );
        $query->setArguments(['id' => $rentalUnitId]);

        return $query;
    }

    public function createBookingQuery(string $bookingId): Query
    {
        $query = (new Query('booking'))->setSelectionSet(
            $this->getBookingSelectionSet()
        );
        $query->setArguments(['id' => $bookingId]);

        return $query;
    }

    public function createCompanyQuery(string $companyId): Query
    {
        $query = (new Query('company'))->setSelectionSet(
            $this->getCompanySelectionSet()
        );
        $query->setArguments(['id' => $companyId]);

        return $query;
    }

    public function createActivityQuery(string $activityId): Query
    {
        $query = (new Query('activity'))->setSelectionSet(
            $this->getActivitySelectionSet()
        );
        $query->setArguments(['id' => $activityId]);

        return $query;
    }

    public function createTicketQuery(string $ticketId): Query
    {
        $query = (new Query('ticket'))->setSelectionSet(
            $this->getTicketSelectionSet()
        );
        $query->setArguments(['id' => $ticketId]);

        return $query;
    }

    public function createAllTicketsQuery(
        string $partnerId,
        int $limit = 10,
        ?string $cursor = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $timeslotId = null,
        ?string $externalTimeslotId = null,
        ?array $activityIds = [],
        ?string $companyId = null
    ): Query {
        $arguments = ['first' => $limit];
        if ($cursor) {
            $arguments['after'] = $cursor;
        }

        if ($startDate) {
            $arguments['startDate'] = $startDate->format('Y-m-d');
        }
        if ($endDate) {
            $arguments['endDate'] = $endDate->format('Y-m-d');
        }
        if ($timeslotId) {
            $arguments['timeslotId'] = $timeslotId;
        }
        if ($externalTimeslotId) {
            $arguments['externalTimeslotId'] = $externalTimeslotId;
        }
        if ($activityIds) {
            $arguments['activityIds'] = $activityIds;
        }
        if ($companyId) {
            $arguments['companyId'] = $companyId;
        }


        return (new Query('partner'))
            ->setArguments(['id' => $partnerId])
            ->setSelectionSet([
                  (new Query('allTickets'))
                      ->setArguments($arguments)
                      ->setSelectionSet($this->getTicketRelaySelectionSet())
          ]);
    }


    public function createAllBookingsQuery(
        string $partnerId,
        int $limit = 10,
        ?string $cursor = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $searchQuery = null,
        ?array $rentalUnitIds = []
    ): Query {
        $arguments = ['first' => $limit];
        if ($cursor) {
            $arguments['after'] = $cursor;
        }

        if ($startDate) {
            $arguments['startDate'] = $startDate->format('Y-m-d');
        }
        if ($endDate) {
            $arguments['endDate'] = $endDate->format('Y-m-d');
        }
        if ($searchQuery) {
            $arguments['searchQuery'] = $searchQuery;
        }
        if ($rentalUnitIds) {
            $arguments['rentalUnitIds'] = $rentalUnitIds;
        }

        return (new Query('partner'))
            ->setArguments(['id' => $partnerId])
            ->setSelectionSet([
                (new Query('allBookings'))
                    ->setArguments($arguments)
                    ->setSelectionSet($this->getBookingRelaySelectionSet())
            ]);
    }

    public function createUpdatedBookingsQuery(
        string $partnerId,
        DateTimeInterface $updatedSince
    ): Query {
        return (new Query('partner'))
            ->setArguments(['id' => $partnerId])
            ->setSelectionSet([
                (new Query('updatedBookings'))
                    ->setArguments(['since' => $updatedSince->format('Y-m-d')])
                    ->setSelectionSet($this->getBookingSelectionSet())
            ]);
    }


    /******************************************************************************************************************
     *                                  MUTATIONS
     ******************************************************************************************************************/

    public function createCreateOrUpdateAllotmentsMutation(): Mutation
    {
        return (new Mutation('createOrReplaceAllotments'))
            ->setVariables([new Variable('input', 'CreateOrReplaceAllotmentsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([(new Query('allotments'))->setSelectionSet([
                    'amount',
                    'date',
                ])
            ]);
    }

    public function createCreateOrUpdateTripPricingsMutation(): Mutation
    {
        return (new Mutation('createOrReplaceTripPricings'))
            ->setVariables([new Variable('input', 'CreateOrReplaceTripPricingsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([(new Query('tripPricings'))->setSelectionSet([
                   'date',
                   'duration',
                   'price',
                   'minimumStayPrice',
                   'extraPersonPrice',
               ])
            ]);
    }

    public function createDeleteTripsMutation(): Mutation
    {
        return (new Mutation('deleteTripPricings'))
            ->setVariables([new Variable('input', 'DeleteTripPricingsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet(['message']);
    }

    public function createCompletePendingBookingMutation(): Mutation
    {
        return (new Mutation('completePendingBooking'))
            ->setVariables([new Variable('input', 'CompletePendingBookingInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([
                (new Query('booking'))->setSelectionSet($this->getBookingSelectionSet())
            ]);
    }

    public function createDeleteActivityTimeslotsMutation(): Mutation
    {
        return (new Mutation('deleteActivityTimeslots'))
            ->setVariables([new Variable('input', 'DeleteActivityTimeslotsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([
                (new Query('activity'))->setSelectionSet([
                    'deletedCount',
                    'errorCount',
                ])
            ]);
    }

    public function createCreateOrReplaceActivityTimeslotsMutation(): Mutation
    {
        return (new Mutation('createOrReplaceActivityTimeslots'))
            ->setVariables([new Variable('input', 'CreateOrReplaceActivityTimeslotsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([
                (new Query('timeslots'))->setSelectionSet($this->getTimeslotSelectionSet())
            ]);
    }



    /******************************************************************************************************************
     *                                  Selection sets
     ******************************************************************************************************************/


    private function getBookingRelaySelectionSet(): array
    {
        return [
            'totalCount',
            (new Query('pageInfo'))->setSelectionSet([
                'hasNextPage',
                'hasPreviousPage',
                'startCursor',
                'endCursor',
            ]),
            (new Query('edges'))->setSelectionSet([
                'cursor',
                (new Query('node'))->setSelectionSet($this->getBookingSelectionSet())
            ])
        ];
    }

    private function getBookingSelectionSet(): array
    {
        return [
            'id',
            'number',
            'arrivalDate',
            'departureDate',
            'duration',
            'amountAdults',
            'amountYouths',
            'amountChildren',
            'amountBabies',
            'amountPets',
            'status',
            'customerComment',
            'createdAt',
            'updatedAt',
            (new Query('additions'))->setSelectionSet([
                'title',
                'unitPrice',
                'totalPrice',
                'amount',
                'calculation',
                (new Query('surcharge'))->setSelectionSet([
                    'id',
                    'name',
                ]),
            ]),
            (new Query('customer'))->setSelectionSet($this->getCustomerSelectionSet()),
            (new Query('invoiceAddress'))->setSelectionSet($this->getAddressSelectionSet()),
            (new Query('rentalUnit'))->setSelectionSet([
                'id',
            ]),
            'accommodationSum',
            'totalPrice',
            'totalPricePaid',
            'deposit',
            'depositPaid',
            'touristTax',
            'touristTaxPaid',
            (new Query('special'))->setSelectionSet([
                'id',
                'name',
            ]),
        ];
    }

    private function getPartnerSelectionSet(): array
    {
        return [
            'id',
            'enabled',
            'name',
            (new Query('accommodations'))->setSelectionSet($this->getAccommodationSelectionSet()),
            (new Query('companies'))->setSelectionSet($this->getCompanySelectionSet()),

        ];
    }

    private function getAccommodationSelectionSet(): array
    {
        return [
            'id',
            'enabled',
            'name',
            (new Query('rentalUnits'))->setSelectionSet($this->getRentalUnitSelectionSet()),
        ];
    }

    private function getRentalUnitSelectionSet(): array
    {
        return [
            'id',
            'name',
            'code',
            'enabled',
            'type',
            'maxAllotment',
            'includedOccupancy',
        ];
    }

    private function getCompanySelectionSet(): array
    {
        return [
            'id',
            'name',
            (new Query('activities'))->setSelectionSet($this->getActivitySelectionSet()),
        ];
    }

    private function getActivitySelectionSet(): array
    {
        return [
            'id',
            (new Query('name'))->setArguments(['locale' => $this->locale]),
            (new Query('activityRateGroups'))->setSelectionSet($this->getActivityRateGroupSelectionSet()),
        ];
    }

    private function getActivityRateGroupSelectionSet(): array
    {
        return [
            'id',
            'name',
            'canBuyTickets',
            (new Query('rates'))->setSelectionSet($this->getRateSelectionSet()),
        ];
    }

    private function getRateSelectionSet(): array
    {
        return [
            'id',
            (new Query('name'))->setArguments(['locale' => $this->locale]),
            'price'
        ];
    }

    private function getTicketSelectionSet(): array
    {
        return [
            'id',
            'number',
            'status',
            (new Query('timeslot'))->setSelectionSet($this->getTimeslotSelectionSet()),
            (new Query('customer'))->setSelectionSet($this->getCustomerSelectionSet()),
            (new Query('rateLines'))->setSelectionSet($this->getTicketRateLineSelectionSet()),
            'createdAt',
        ];
    }

    private function getTicketRateLineSelectionSet(): array
    {
        return [
            (new Query('rateName'))->setArguments(['locale' => $this->locale]),
            'unitPrice',
            'amount',
            (new Query('rate'))->setSelectionSet($this->getRateSelectionSet()),
        ];
    }

    private function getCustomerSelectionSet(): array
    {
        return [
            'id',
            'locale',
            'firstName',
            'lastName',
            (new Query('address'))->setSelectionSet($this->getAddressSelectionSet()),
            'phoneNumber',
            'email',
            'birthdate',
        ];
    }

    private function getTimeslotSelectionSet(): array
    {
        return [
            'id',
            (new Query('label'))->setArguments(['locale' => $this->locale]),
            (new Query('rateGroup'))->setSelectionSet($this->getActivityRateGroupSelectionSet()),
            'startDateTime',
            'endDateTime',
            'allotment',
            'externalId',
        ];
    }

    private function getAddressSelectionSet(): array
    {
        return [
            'street',
            'number',
            'postalCode',
            'city',
            'countryCode',
        ];
    }

    private function getTicketRelaySelectionSet(): array
    {
        return [
            'totalCount',
            (new Query('pageInfo'))->setSelectionSet([
                 'hasNextPage',
                 'hasPreviousPage',
                 'startCursor',
                 'endCursor',
            ]),
            (new Query('edges'))->setSelectionSet([
                'cursor',
                (new Query('node'))->setSelectionSet($this->getTicketSelectionSet())
            ])
        ];
    }
}
