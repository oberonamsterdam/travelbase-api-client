<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL;

use GraphQL\Client;
use GraphQL\Query;
use TOR\GraphQL\Exception\NotFoundException;
use \DateTime;

class TorClient
{
    /** @var Client */
    private $client;

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
    }


    public function getPartners()
    {
        $query = (new Query('partners'))->setSelectionSet([
            'id',
            'enabled',
            'companyName',
            (new Query('accommodations'))->setSelectionSet([
                'id',
                'enabled',
                'name',
                (new Query('rentalUnits'))->setSelectionSet([
                    'id',
                    'name',
                    'code',
                    'enabled',
                    'type',
                    'maxAllotment',
                    'includedOccupancy'
                ])
            ])
        ]);

        $this->client->runQuery($query);
    }


    public function getPartner(int $partnerId)
    {

    }


    public function getUpcomingBookings(int $partnerId, int $first = 0, int $limit = 100)
    {

    }

    public function getRecentlyUpdatedBookings(int $partnerId, int $first = 0, int $limit = 100)
    {

    }

    public function getAllBookings(
        int $partnerId,
        int $first = 0,
        int $limit = 100,
        ?DateTime $startDate = null,
        ?DateTime $endDate = null,
        ?string $searchQuery = null,
        ?array $rentalUnitIds = []
    ) {

    }

    public function getAccommodation(int $accommodationId)
    {

    }

    public function getRentalUnit(int $rentalUnitId)
    {

    }

    public function createOrReplaceAllotments(int $rentalUnitId, array $allotments)
    {

    }

    public function createOrReplaceTripPricings(int $rentalUnitId, array $tripPricings)
    {

    }

    public function deleteTrips(int $rentalUnitId, ?DateTime $date = null, ?int $duration = null)
    {

    }
}
