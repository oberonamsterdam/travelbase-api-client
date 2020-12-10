<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\CreateOrReplaceTripPricingsResult;

class CreateOrReplaceTripPricingsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CreateOrReplaceTripPricingsResult
     */
    private $data;

    public function __construct(CreateOrReplaceTripPricingsResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return CreateOrReplaceTripPricingsResult
     */
    public function getData(): CreateOrReplaceTripPricingsResult
    {
        return $this->data;
    }
}
