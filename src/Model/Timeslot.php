<?php

namespace Oberon\TravelbaseClient\Model;

use DateTimeInterface;

class Timeslot
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var ActivityRateGroup|null
     */
    private $rateGroup;

    /**
     * @var DateTimeInterface
     */
    private $startDateTime;

    /**
     * @var DateTimeInterface
     */
    private $endDateTime;

    /**
     * @var int|null
     */
    private $allotment;

    /**
     * @var string|null
     */
    private $externalId;

    /**
     * @var Activity|null
     */
    private $activity;

    /**
     * Timeslot constructor
     * @param string $id
     * @param ActivityRateGroup|null $rateGroup
     * @param DateTimeInterface $startDateTime
     * @param DateTimeInterface $endDateTime
     * @param int|null $allotment
     * @param string|null $externalId
     * @param Activity|null $activity
     */
    public function __construct(
        string $id,
        ?ActivityRateGroup $rateGroup,
        DateTimeInterface $startDateTime,
        DateTimeInterface $endDateTime,
        ?int $allotment,
        ?string $externalId,
        ?Activity $activity
    ) {
        $this->id = $id;
        $this->rateGroup = $rateGroup;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->allotment = $allotment;
        $this->externalId = $externalId;
        $this->activity = $activity;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return ActivityRateGroup
     */
    public function getRateGroup(): ActivityRateGroup
    {
        if (!$this->rateGroup) {
            throw new \LogicException('RateGroup was not fetched in this context.');
        }

        return $this->rateGroup;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartDateTime(): DateTimeInterface
    {
        return $this->startDateTime;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEndDateTime(): DateTimeInterface
    {
        return $this->endDateTime;
    }

    /**
     * @return int|null
     */
    public function getAllotment(): ?int
    {
        return $this->allotment;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @return Activity
     */
    public function getActivity(): Activity
    {
        if (!$this->activity) {
            throw new \LogicException('RateGroup was not fetched in this context.');
        }

        return $this->activity;
    }
}
