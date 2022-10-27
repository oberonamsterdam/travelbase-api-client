<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\DatePricingModifier;

class EditDatePricingModifierResult
{
    /**
     * @var DatePricingModifier
     */
    public $editDatePricingModifier;

    public function __construct(DatePricingModifier $editDatePricingModifier)
    {
        $this->editDatePricingModifier = $editDatePricingModifier;
    }

    public function getEditDatePricingModifier(): DatePricingModifier
    {
        return $this->editDatePricingModifier;
    }
}
