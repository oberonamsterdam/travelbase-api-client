<?php
/**
 * Date: 06-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace Oberon\TorClient\Query;

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

    public static function createRecentlyUpdatedBookingsQuery(
        int $partnerId,
        int $limit = 10,
        ?string $cursor = null
    ): Query {
        $arguments = ['first' => $limit];
        if ($cursor) {
            $arguments['after'] = $cursor;
        }

        return (new Query('partner'))
            ->setArguments(['id' => $partnerId])
            ->setSelectionSet([
                (new Query('recentlyUpdatedBookings'))
                    ->setArguments($arguments)
                    ->setSelectionSet(self::getBookingRelaySelectionSet())
            ])
        ;
    }

    public static function createUpcomingBookingsQuery(
        int $partnerId,
        int $limit = 10,
        ?string $cursor = null
    ): Query {
        $arguments = ['first' => $limit];
        if ($cursor) {
            $arguments['after'] = $cursor;
        }

        return (new Query('partner'))
            ->setArguments(['id' => $partnerId])
            ->setSelectionSet([
                (new Query('upcomingBookings'))
                    ->setArguments($arguments)
                    ->setSelectionSet(self::getBookingRelaySelectionSet())
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
                (new Query('node'))->setSelectionSet([
                    'id',
                    'number',
                    'arrivalDate',
                    'departureDate',
                    'duration',
                    'amountAdults',
                    'amountChildren',
                    'amountBabies',
                    'amountDogs',
                    'status',
                    'customerComment',
                    'rentalSum',
                    'travelSum',
                    'createdAt',
                    'updatedAt',
                    (new Query('rentalUnit'))->setSelectionSet([
                        'id',
                    ]),
                    (new Query('partnerPriceLines'))->setSelectionSet([
                        'category',
                        'label',
                        'unitPrice',
                        'modifier',
                        'totalPrice',
                    ]),
                    (new Query('order'))->setSelectionSet([
                        'id',
                        'locale',
                        'customerFirstName',
                        'customerInfix',
                        'customerLastName',
                        'customerPhoneNumber',
                        'customerEmail',
                        (new Query('customerAddress'))->setSelectionSet([
                            'street',
                            'number',
                            'postalCode',
                            'city',
                            'countryCode',
                            'countryName'
                        ]),
                    ])
                ])
            ])
        ];
    }



    private static function getPartnerSelectionSet()
    {
        return [
            'id',
            'enabled',
            'companyName',
            (new Query('accommodations'))->setSelectionSet(self::getAccommodationSelectionSet())
        ];
    }

    private static function getAccommodationSelectionSet()
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
            'includedOccupancy'
        ];
    }

}
