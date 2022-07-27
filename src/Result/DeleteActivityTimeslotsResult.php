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
    private $errorCount;

    /**
     * DeleteActivityTimeslotsResult constructor.
     * @param Message $errorCount
     */
    public function __construct(Message $errorCount)
    {
        $this->errorCount = $errorCount;
    }

    /**
     * @return Message
     */
    public function getDeleteActivityTimeslots(): Message
    {
        return $this->errorCount;
    }
}
