<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\DeleteTripPricingsResult;

class DeleteTripPricingsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var DeleteTripPricingsResult
     */
    private $data;

    public function __construct(DeleteTripPricingsResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return DeleteTripPricingsResult
     */
    public function getData(): DeleteTripPricingsResult
    {
        return $this->data;
    }
}
