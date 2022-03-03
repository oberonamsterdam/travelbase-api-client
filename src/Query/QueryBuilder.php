<?php
/**
 * Date: 06-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace Oberon\TravelbaseClient\Query;

use GraphQL\Query;
use DateTimeInterface;

class QueryBuilder
{
    public static function createPartnersQuery(): Query
    {
        return (new Query('partners'))->setSelectionSet(
            self::getPartnerSelectionSet()
        );
    }

    public static function createPartnerQuery(int $partnerId): Query
    {
        $query = (new Query('partner'))->setSelectionSet(
            self::getPartnerSelectionSet()
        );
        $query->setArguments(['id' => $partnerId]);

        return $query;
    }

    public static function createAccommodationQuery(int $accommodationId): Query
    {
        $query = (new Query('accommodation'))->setSelectionSet(
            self::getAccommodationSelectionSet()
        );
        $query->setArguments(['id' => $accommodationId]);

        return $query;
    }

    public static function createRentalUnitQuery(int $rentalUnitId): Query
    {
        $query = (new Query('rentalUnit'))->setSelectionSet(
            self::getRentalUnitSelectionSet()
        );
        $query->setArguments(['id' => $rentalUnitId]);

        return $query;
    }

    public static function createBookingQuery(int $bookingId): Query
    {
        $query = (new Query('booking'))->setSelectionSet(
            self::getBookingSelectionSet()
        );
        $query->setArguments(['id' => $bookingId]);

        return $query;
    }

    public static function createCompanyQuery(int $companyId): Query
    {
        $query = (new Query('company'))->setSelectionSet(
            self::getCompanySelectionSet()
        );
        $query->setArguments(['id' => $companyId]);

        return $query;
    }

    public static function createActivityQuery(int $activityId): Query
    {
        $query = (new Query('activity'))->setSelectionSet(
            self::getActivitySelectionSet()
        );
        $query->setArguments(['id' => $activityId]);

        return $query;
    }

    public static function createTicketQuery(int $ticketId): Query
    {
        $query = (new Query('ticket'))->setSelectionSet(
            self::getTicketSelectionSet()
        );
        $query->setArguments(['id' => $ticketId]);

        return $query;
    }

    public static function createAllTicketsQuery(
        int $partnerId,
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
                      ->setSelectionSet(self::getTicketRelaySelectionSet())
          ]);
    }


    public static function createAllBookingsQuery(
        int $partnerId,
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
                    ->setSelectionSet(self::getBookingRelaySelectionSet())
            ])
        ;
    }

    public static function createUpdatedBookingsQuery(
        int $partnerId,
        DateTimeInterface $updatedSince
    ): Query {
        return (new Query('partner'))
            ->setArguments(['id' => $partnerId])
            ->setSelectionSet([
                (new Query('updatedBookings'))
                    ->setArguments(['since' => $updatedSince->format('Y-m-d')])
                    ->setSelectionSet(self::getBookingSelectionSet())
            ])
        ;
    }

    private static function getBookingRelaySelectionSet(): array
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
                (new Query('node'))->setSelectionSet(self::getBookingSelectionSet())
            ])
        ];
    }

    public static function getBookingSelectionSet(): array
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
            (new Query('customer'))->setSelectionSet(self::getCustomerSelectionSet()),
            (new Query('invoiceAddress'))->setSelectionSet(self::getAddressSelectionSet()),
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

    public static function getPartnerSelectionSet(): array
    {
        return [
            'id',
            'enabled',
            'name',
            (new Query('accommodations'))->setSelectionSet(self::getAccommodationSelectionSet()),
            (new Query('companies'))->setSelectionSet(self::getCompanySelectionSet()),

        ];
    }

    public static function getAccommodationSelectionSet(): array
    {
        return [
            'id',
            'enabled',
            'name',
            (new Query('rentalUnits'))->setSelectionSet(self::getRentalUnitSelectionSet()),
        ];
    }

    public static function getRentalUnitSelectionSet(): array
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

    public static function getCompanySelectionSet(): array
    {
        return [
            'id',
            'name',
            (new Query('activities'))->setSelectionSet(self::getActivitySelectionSet()),
        ];
    }

    public static function getActivitySelectionSet(): array
    {
        return [
            'id',
            'name',
            (new Query('activityRateGroups'))->setSelectionSet(self::getActivityRateGroupSelectionSet()),
        ];
    }

    public static function getActivityRateGroupSelectionSet(): array
    {
        return [
            'id',
            'name',
            'canBuyTickets',
        ];
    }

    public static function getTicketSelectionSet(): array
    {
        return [
            'id',
            'status',
            (new Query('timeslot'))->setSelectionSet(self::getTimeslotSelectionSet()),
            (new Query('customer'))->setSelectionSet(self::getCustomerSelectionSet()),
            'startDateTime',
            'endDateTime',
            'createdAt',
        ];
    }

    public static function getCustomerSelectionSet(): array
    {
        return [
            'id',
            'locale',
            'firstName',
            'lastName',
            (new Query('address'))->setSelectionSet(self::getAddressSelectionSet()),
            'phoneNumber',
            'email',
            'birthdate',
        ];
    }

    public static function getTimeslotSelectionSet(): array
    {
        return [
            'id',
            'label',
            (new Query('rateGroup'))->setSelectionSet(self::getActivityRateGroupSelectionSet()),
            'startDateTime',
            'endDateTime',
            'allotment',
            'externalId',
        ];
    }

    public static function getAddressSelectionSet(): array
    {
        return [
            'street',
            'number',
            'postalCode',
            'city',
            'countryCode',
        ];
    }

    public static function getTicketRelaySelectionSet(): array
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
                  (new Query('node'))->setSelectionSet(self::getTicketSelectionSet())
              ])
        ];
    }
}
