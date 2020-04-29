<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL;

use GraphQL\Client;
use GraphQL\Query;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use TOR\GraphQL\Exception\NotFoundException;
use \DateTime;
use TOR\GraphQL\Model\Partner;

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
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
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

        $result = $this->runQuery($query);

        return $this->parseResult($result, Partner::class);
    }

    private function parseResult(string $data, string $class)
    {
        return $this->serializer->deserialize(json_encode($data), $class, 'json');
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

    private function runQuery($query): string
    {
        try {
            $result = $this->client->runQuery($query);
            if (!$result->getResponseBody()) {
                throw new \Exception('No response body found');
            }
            return $result->getResponseBody();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
