<?php
/**
 * Date: 22-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Model;

class DeleteActivityTimeslotsPayload
{
    /**
     * @var int
     */
    private $deletedCount;

    /**
     * @var int
     */
    private $errorCount;

    /**
     * TimeslotCollection constructor.
     * @param int $deletedCount
     * @param int $errorCount
     */
    public function __construct(
        int $deletedCount,
        int $errorCount
    ) {
        $this->deletedCount = $deletedCount;
        $this->errorCount = $errorCount;
    }

    /**
     * @return int
     */
    public function getDeletedCount(): int
    {
        return $this->deletedCount;
    }

    /**
     * @return int
     */
    public function getErrorCount(): int
    {
        return $this->errorCount;
    }
}
