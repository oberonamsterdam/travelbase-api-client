<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\CreateOrReplaceDatePricingsResult;

class CreateOrReplaceDatePricingsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CreateOrReplaceDatePricingsResult
     */
    private $data;

    public function __construct(CreateOrReplaceDatePricingsResult $data)
    {
        $this->data = $data;
    }

    public function getData(): CreateOrReplaceDatePricingsResult
    {
        return $this->data;
    }
}
