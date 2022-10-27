<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\CreateDatePricingModifierResult;

class CreateDatePricingModifierCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CreateDatePricingModifierResult
     */
    private $data;

    public function __construct(CreateDatePricingModifierResult $data)
    {
        $this->data = $data;
    }

    public function getData(): CreateDatePricingModifierResult
    {
        return $this->data;
    }
}
