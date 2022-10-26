<?php

namespace Oberon\TravelbaseClient\Model;

class DatePricingCollection
{
    /**
     * @var DatePricing[]
     */
    private $datePricings = [];

    /**
     * DatePricingCollection constructor.
     * @param array $datePricings
     */
    public function __construct(
        array $datePricings
    ) {
        $this->$datePricings = $datePricings;
    }

    /**
     * @return DatePricing[]
     */
    public function getDatePricings(): array
    {
        return $this->datePricings;
    }

    /**
     * @param DatePricing $datePricing
     * @return self
     */
    public function addDatePricing(DatePricing $datePricing): self
    {
        $this->datePricings[] = $datePricing;

        return $this;
    }
}
