<?php
/**
 * Date: 01-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Result;

use TOR\GraphQL\Model\Message;

class DeleteTripsResult
{
    /**
     * @var Message
     */
    private $deleteTrips;

    /**
     * @return Message
     */
    public function getDeleteTrips(): Message
    {
        return $this->deleteTrips;
    }

    /**
     * @param Message $deleteTrips
     * @return self
     */
    public function setDeleteTrips(Message $deleteTrips): self
    {
        $this->deleteTrips = $deleteTrips;

        return $this;
    }

}
