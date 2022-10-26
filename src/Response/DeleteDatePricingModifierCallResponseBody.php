<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\DeleteDatePricingModifierResult;

class DeleteDatePricingModifierCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var DeleteDatePricingModifierResult
     */
    private $data;

    public function __construct(DeleteDatePricingModifierResult $data)
    {
        $this->data = $data;
    }

    public function getData(): DeleteDatePricingModifierResult
    {
        return $this->data;
    }
}
