<?php
/**
 * Date: 22-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Result;

class DeleteActivityTimeslotsResult
{
    /**
     * @var array
     */
    private $deleteActivityTimeslots;

    /**
     * DeleteActivityTimeslotsResult constructor.
     * @param array $deleteActivityTimeslots
     */
    public function __construct(array $deleteActivityTimeslots)
    {
        $this->deleteActivityTimeslots = $deleteActivityTimeslots;
    }

    /**
     * @return array
     */
    public function getDeleteActivityTimeslots(): array
    {
        return $this->deleteActivityTimeslots;
    }
}
