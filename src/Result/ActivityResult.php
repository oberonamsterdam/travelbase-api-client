<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\Activity;

class ActivityResult
{
    /**
     * @var Activity
     */
    public $activity;

    /**
     * ActivityResultConstructor constructor.
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return Activity
     */
    public function getActivity(): Activity
    {
        return $this->activity;
    }
}
