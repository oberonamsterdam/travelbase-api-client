<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Response;

use Oberon\TorClient\Result\DeleteTripPricingsResult;

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
