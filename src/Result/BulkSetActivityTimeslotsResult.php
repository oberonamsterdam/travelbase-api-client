<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\ActivityWrapper;

class BulkSetActivityTimeslotsResult
{
    /**
     * @var ActivityWrapper
     */
    public $bulkSetActivityTimeslots;

    /**
     * BulkSetActivityTimeslotsResult constructor.
     * @param ActivityWrapper $bulkSetActivityTimeslots
     */
    public function __construct(ActivityWrapper $bulkSetActivityTimeslots)
    {
        $this->bulkSetActivityTimeslots = $bulkSetActivityTimeslots;
    }

    /**
     * @return ActivityWrapper
     */
    public function getBulkSetActivityTimeslots(): ActivityWrapper
    {
        return $this->bulkSetActivityTimeslots;
    }
}
