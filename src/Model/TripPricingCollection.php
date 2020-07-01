<?php
/**
 * Date: 01-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class TripPricingCollection implements InputInterface
{
    /**
     * @var TripPricing[]
     */
    private $tripPricings = [];

    /**
     * @return TripPricing[]
     */
    public function getTripPricings(): array
    {
        return $this->tripPricings;
    }

    /**
     * @param TripPricing[] $tripPricings
     * @return self
     */
    public function setTripPricings(array $tripPricings): self
    {
        $this->tripPricings = $tripPricings;

        return $this;
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

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        foreach ($this->getTripPricings() as $tripPricing) {
            $result['tripPricings'][] = $tripPricing->toArray();
        }

        return $result;
    }

}
