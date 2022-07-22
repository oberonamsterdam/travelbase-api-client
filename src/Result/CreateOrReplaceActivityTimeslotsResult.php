<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\ActivityWrapper;

class CreateOrReplaceActivityTimeslotsResult
{
    /**
     * @var ActivityWrapper
     */
    public $createOrReplaceActivityTimeslots;

    /**
     * CreateOrReplaceActivityTimeslotsResult constructor.
     * @param ActivityWrapper $createOrReplaceActivityTimeslots
     */
    public function __construct(ActivityWrapper $createOrReplaceActivityTimeslots)
    {
        $this->createOrReplaceActivityTimeslots = $createOrReplaceActivityTimeslots;
    }

    /**
     * @return ActivityWrapper
     */
    public function getCreateOrReplaceActivityTimeslots(): ActivityWrapper
    {
        return $this->createOrReplaceActivityTimeslots;
    }
}
