<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\DatePricingCollection;

class CreateOrReplaceDatePricingsResult
{
    /**
     * @var DatePricingCollection
     */
    public $createOrReplaceDatePricings;

    public function __construct(DatePricingCollection $createOrReplaceDatePricings)
    {
        $this->createOrReplaceDatePricings = $createOrReplaceDatePricings;
    }

    public function getCreateOrReplaceDatePricings(): DatePricingCollection
    {
        return $this->createOrReplaceDatePricings;
    }
}
