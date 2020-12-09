<?php
/**
 * Date: 01-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Result;

use Oberon\TravelbaseManagementApi\Model\TripPricingCollection;

class CreateOrReplaceTripPricingsResult
{
    /**
     * @var TripPricingCollection
     */
    public $createOrReplaceTripPricings;

    /**
     * CreateOrReplaceTripPricingsResult constructor.
     * @param TripPricingCollection $createOrReplaceTripPricings
     */
    public function __construct(TripPricingCollection $createOrReplaceTripPricings)
    {
        $this->createOrReplaceTripPricings = $createOrReplaceTripPricings;
    }

    /**
     * @return TripPricingCollection
     */
    public function getCreateOrReplaceTripPricings(): TripPricingCollection
    {
        return $this->createOrReplaceTripPricings;
    }
}
