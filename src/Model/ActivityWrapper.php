<?php

namespace Oberon\TravelbaseClient\Model;

class ActivityWrapper
{
    /**
     * @var Activity
     */
    private $activity;

    /**
     * ActivityWrapper constructor.
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function getActivity(): Activity
    {
        return $this->activity;
    }
}
