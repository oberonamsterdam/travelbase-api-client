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
     * @var string|null
     */
    private $externalId;

    /**
     * @var int|null
     */
    private $allotment;

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
     * @param string|null $externalId
     * @param int|null $allotment
     * @param Activity|null $activity
     */
    public function __construct(
        string $id,
        ?ActivityRateGroup $rateGroup,
        DateTimeInterface $startDateTime,
        DateTimeInterface $endDateTime,
        ?string $externalId,
        ?int $allotment,
        ?Activity $activity
    ) {
        $this->id = $id;
        $this->rateGroup = $rateGroup;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->externalId = $externalId;
        $this->allotment = $allotment;
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
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @return int|null
     */
    public function getAllotment(): ?int
    {
        return $this->allotment;
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
