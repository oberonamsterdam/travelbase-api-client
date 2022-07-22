<?php
/**
 * Date: 22-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Model;

class TimeslotCollection
{
    /**
     * @var Timeslot[]
     */
    private $timeslots = [];

    /**
     * TimeslotCollection constructor.
     * @param array $timeslots
     */
    public function __construct(
        array $timeslots
    ) {
        $this->timeslots = $timeslots;
    }

    /**
     * @return Timeslot[]
     */
    public function getTimeslots(): array
    {
        return $this->timeslots;
    }

    /**
     * @param Timeslot $timeslot
     * @return self
     */
    public function addTimeslot(Timeslot $timeslot): self
    {
        $this->timeslots[] = $timeslot;

        return $this;
    }
}
