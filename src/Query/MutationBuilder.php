<?php
/**
 * Date: 06-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Query;

use GraphQL\Mutation;
use GraphQL\Query;
use GraphQL\Variable;

class MutationBuilder
{

    public static function createCreateOrUpdateAllotmentsMutation(): Mutation
    {
        return (new Mutation('createOrReplaceAllotments'))
            ->setVariables([new Variable('input', 'CreateOrReplaceAllotmentsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([
                (new Query('allotments'))->setSelectionSet([
                    'amount',
                    'date'
                ])
            ]);
    }

    public static function createCreateOrUpdateTripPricingsMutation(): Mutation
    {
        return (new Mutation('createOrReplaceTripPricings'))
            ->setVariables([new Variable('input', 'CreateOrReplaceTripPricingsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([
                (new Query('tripPricings'))->setSelectionSet([
                    'date',
                    'duration',
                    'price',
                    'minimumStayPrice',
                    'extraPersonPrice',
                ])
            ]);
    }

    public static function createDeleteTripsMutation(): Mutation
    {
        return (new Mutation('deleteTripPricings'))
            ->setVariables([new Variable('input', 'DeleteTripPricingsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet(['message']);
    }

    public static function createCompletePendingBookingMutation(): Mutation
    {
        return (new Mutation('completePendingBooking'))
            ->setVariables([new Variable('input', 'CompletePendingBookingInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([
                (new Query('booking'))->setSelectionSet(QueryBuilder::getBookingSelectionSet())
            ]);
    }

    public static function createBulkSetActivityTimeslotsMutation(): Mutation
    {
        return (new Mutation('bulkSetActivityTimeslots'))
            ->setVariables([new Variable('input', 'BulkSetActivityTimeslotsInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet([
                (new Query('activity'))->setSelectionSet(QueryBuilder::getActivitySelectionSet())
            ]);
    }
}
