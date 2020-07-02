<?php
/**
 * Date: 01-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class TripPricingCollection
{
    /**
     * @var TripPricing[]
     */
    private $tripPricings = [];

    /**
     * TripPricingCollection constructor.
     * @param array $tripPricings
     */
    public function __construct(
        array $tripPricings
    ) {
        $this->tripPricings = $tripPricings;
    }

    /**
     * @return TripPricing[]
     */
    public function getTripPricings(): array
    {
        return $this->tripPricings;
    }

    /**
     * @param TripPricing $tripPricing
     * @return self
     */
    public function addTripPricing(TripPricing $tripPricing): self
    {
        $this->tripPricings[] = $tripPricing;

        return $this;
    }
}
