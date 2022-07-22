<?php
/**
 * Date: 22-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\Message;

class DeleteActivityTimeslotsResult
{
    /**
     * @var Message
     */
    private $deleteActivityTimeslots;

    /**
     * DeleteActivityTimeslotsResult constructor.
     * @param Message $deleteActivityTimeslots
     */
    public function __construct(Message $deleteActivityTimeslots)
    {
        $this->deleteActivityTimeslots = $deleteActivityTimeslots;
    }

    /**
     * @return Message
     */
    public function getDeleteActivityTimeslots(): Message
    {
        return $this->deleteActivityTimeslots;
    }
}
