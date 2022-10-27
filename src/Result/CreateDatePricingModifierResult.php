<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\DatePricingModifier;

class CreateDatePricingModifierResult
{
    /**
     * @var DatePricingModifier
     */
    public $createDatePricingModifier;

    public function __construct(DatePricingModifier $createDatePricingModifier)
    {
        $this->createDatePricingModifier = $createDatePricingModifier;
    }

    public function getCreateDatePricingModifier(): DatePricingModifier
    {
        return $this->createDatePricingModifier;
    }
}
