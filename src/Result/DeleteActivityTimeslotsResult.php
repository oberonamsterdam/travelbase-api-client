<?php
/**
 * Date: 22-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\DeleteActivityTimeslotsPayload;

class DeleteActivityTimeslotsResult
{
    /**
     * @var DeleteActivityTimeslotsPayload
     */
    private $deleteActivityTimeslotsPayload;

    /**
     * DeleteActivityTimeslotsResult constructor.
     * @param DeleteActivityTimeslotsPayload $deleteActivityTimeslotsPayload
     */
    public function __construct(DeleteActivityTimeslotsPayload $deleteActivityTimeslotsPayload)
    {
        $this->deleteActivityTimeslotsPayload = $deleteActivityTimeslotsPayload;
    }

    /**
     * @return Message
     */
    public function getDeleteActivityTimeslotsPayload(): DeleteActivityTimeslotsPayload
    {
        return $this->deleteActivityTimeslotsPayload;
    }
}
