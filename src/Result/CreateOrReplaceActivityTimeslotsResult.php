<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\TimeslotWrapper;

class CreateOrReplaceActivityTimeslotsResult
{
    /**
     * @var TimeslotWrapper
     */
    public $createOrReplaceActivityTimeslots;

    /**
     * CreateOrReplaceActivityTimeslotsResult constructor.
     * @param TimeslotWrapper $createOrReplaceActivityTimeslots
     */
    public function __construct(TimeslotWrapper $createOrReplaceActivityTimeslots)
    {
        $this->createOrReplaceActivityTimeslots = $createOrReplaceActivityTimeslots;
    }

    /**
     * @return TimeslotWrapper
     */
    public function getCreateOrReplaceActivityTimeslots(): TimeslotWrapper
    {
        return $this->createOrReplaceActivityTimeslots;
    }
}
