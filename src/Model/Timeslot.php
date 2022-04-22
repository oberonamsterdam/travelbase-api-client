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
     * @var string|null
     */
    private $label;

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
     * @var int|null
     */
    private $allotment;

    /**
     * @var string|null
     */
    private $externalId;

    /**
     * Timeslot constructor
     * @param string $id
     * @param string|null $label
     * @param ActivityRateGroup $rateGroup
     * @param DateTimeInterface $startDateTime
     * @param DateTimeInterface $endDateTime
     * @param int|null $allotment
     * @param string|null $externalId
     */
    public function __construct(
        string $id,
        ?string $label,
        ActivityRateGroup $rateGroup,
        DateTimeInterface $startDateTime,
        DateTimeInterface $endDateTime,
        ?int $allotment,
        ?string $externalId
    ) {
        $this->id = $id;
        $this->label = $label;
        $this->rateGroup = $rateGroup;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->allotment = $allotment;
        $this->externalId = $externalId;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
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
}
