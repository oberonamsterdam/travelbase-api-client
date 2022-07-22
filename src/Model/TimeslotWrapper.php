<?php

namespace Oberon\TravelbaseClient\Model;

class TimeslotWrapper
{
    /**
     * @var Timeslot
     */
    private $timeslot;

    /**
     * TimeslotWrapper constructor.
     * @param Timeslot $timeslot
     */
    public function __construct(Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;
    }

    public function getTimeslot(): Timeslot
    {
        return $this->timeslot;
    }
}
