<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\EditDatePricingModifierResult;

class EditDatePricingModifierCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var EditDatePricingModifierResult
     */
    private $data;

    public function __construct(EditDatePricingModifierResult $data)
    {
        $this->data = $data;
    }

    public function getData(): EditDatePricingModifierResult
    {
        return $this->data;
    }
}
