<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\TimeslotCollection;

class CreateOrReplaceActivityTimeslotsResult
{
    /**
     * @var TimeslotCollection
     */
    public $createOrReplaceActivityTimeslots;

    /**
     * CreateOrReplaceActivityTimeslotsResult constructor.
     * @param TimeslotCollection $createOrReplaceActivityTimeslots
     */
    public function __construct(TimeslotCollection $createOrReplaceActivityTimeslots)
    {
        $this->createOrReplaceActivityTimeslots = $createOrReplaceActivityTimeslots;
    }

    /**
     * @return TimeslotCollection
     */
    public function getCreateOrReplaceActivityTimeslots(): TimeslotCollection
    {
        return $this->createOrReplaceActivityTimeslots;
    }
}
