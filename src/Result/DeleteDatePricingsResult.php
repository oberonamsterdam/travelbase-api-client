<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\Message;

class DeleteDatePricingsResult
{
    /**
     * @var Message
     */
    private $deleteDatePricings;

    public function __construct(Message $deleteDatePricings)
    {
        $this->deleteDatePricings = $deleteDatePricings;
    }

    public function getDeleteDatePricings(): Message
    {
        return $this->deleteDatePricings;
    }
}
