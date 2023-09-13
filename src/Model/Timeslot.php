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
     * @var ActivityRateGroup
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
     * Timeslot constructor
     * @param string $id
     * @param ActivityRateGroup $rateGroup
     * @param DateTimeInterface $startDateTime
     * @param DateTimeInterface $endDateTime
     * @param string|null $externalId
     * @param int|null $allotment
     */
    public function __construct(
        string $id,
        ActivityRateGroup $rateGroup,
        DateTimeInterface $startDateTime,
        DateTimeInterface $endDateTime,
        ?string $externalId,
        ?int $allotment
    ) {
        $this->id = $id;
        $this->rateGroup = $rateGroup;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->externalId = $externalId;
        $this->allotment = $allotment;
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

}
