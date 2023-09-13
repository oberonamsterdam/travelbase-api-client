<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\DeleteDatePricingsResult;

class DeleteDatePricingsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var DeleteDatePricingsResult
     */
    private $data;

    public function __construct(DeleteDatePricingsResult $data)
    {
        $this->data = $data;
    }

    public function getData(): DeleteDatePricingsResult
    {
        return $this->data;
    }
}
