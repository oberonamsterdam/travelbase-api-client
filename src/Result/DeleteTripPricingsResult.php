<?php
/**
 * Date: 01-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Result;

use Oberon\TorClient\Model\Message;

class DeleteTripPricingsResult
{
    /**
     * @var Message
     */
    private $deleteTripPricings;

    /**
     * DeleteTripPricingsResult constructor.
     * @param Message $deleteTripPricings
     */
    public function __construct(Message $deleteTripPricings)
    {
        $this->deleteTripPricings = $deleteTripPricings;
    }

    /**
     * @return Message
     */
    public function getDeleteTripPricings(): Message
    {
        return $this->deleteTripPricings;
    }
}
