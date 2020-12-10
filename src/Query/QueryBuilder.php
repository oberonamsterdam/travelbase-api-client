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
            $arguments['startDate'] = $startDate;
        }
        if ($endDate) {
            $arguments['endDate'] = $endDate;
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

    private static function getBookingSelectionSet(): array
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
                'unitPrice',
                'totalPrice',
                'amount',
                'calculation',
                (new Query('surcharge'))->setSelectionSet([
                    'id',
                    'name',
                ]),
            ]),
            (new Query('customer'))->setSelectionSet([
                'locale',
                'salutation',
                'firstName',
                'lastName',
                (new Query('address'))->setSelectionSet([
                    'street',
                    'number',
                    'postalCode',
                    'city',
                    'countryCode',
                ]),
                'phoneNumber',
                'email',
                'birthdate',
            ]),
            (new Query('invoiceAddress'))->setSelectionSet([
                'street',
                'number',
                'postalCode',
                'city',
                'countryCode',
            ]),
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

    private static function getPartnerSelectionSet(): array
    {
        return [
            'id',
            'enabled',
            'name',
            (new Query('accommodations'))->setSelectionSet(self::getAccommodationSelectionSet())
        ];
    }

    private static function getAccommodationSelectionSet(): array
    {
        return [
            'id',
            'enabled',
            'name',
            (new Query('rentalUnits'))->setSelectionSet(self::getRentalUnitSelectionSet())
        ];
    }

    private static function getRentalUnitSelectionSet(): array
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
}
