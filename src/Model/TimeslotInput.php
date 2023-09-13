<?php

namespace Oberon\TravelbaseClient\Model;

use DateTimeInterface;

class TimeslotInput implements InputInterface
{
    /**
     * Required attribute
     * @var string
     */
    private $rateGroupId;

    /**
     * Required attribute
     * @var DateTimeInterface
     */
    private $startDateTime;

    /**
     * Required attribute
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
     * TimeslotInput constructor
     * @param string $rateGroupId --- Required
     * @param DateTimeInterface $startDateTime --- Required
     * @param DateTimeInterface $endDateTime --- Required
     * @param string $externalId --- Required
     * @param int|null $allotment
     */
    public function __construct(
        string $rateGroupId,
        DateTimeInterface $startDateTime,
        DateTimeInterface $endDateTime,
        string $externalId,
        ?int $allotment = null
    ) {
        $this->rateGroupId = $rateGroupId;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->externalId = $externalId;
        $this->allotment = $allotment;
    }

    public function getRateGroupId(): string
    {
        return $this->rateGroupId;
    }

    /**
     * @param string|null $rateGroupId
     * @return $this
     */
    public function setRateGroupId(string $rateGroupId): self
    {
        $this->rateGroupId = $rateGroupId;

        return $this;
    }

    public function getStartDateTime(): DateTimeInterface
    {
        return $this->startDateTime;
    }

    /**
     * @param DateTimeInterface $startDateTime
     * @return $this
     */
    public function setStartDateTime(DateTimeInterface $startDateTime): self
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): DateTimeInterface
    {
        return $this->endDateTime;
    }

    /**
     * @param DateTimeInterface $endDateTime
     * @return $this
     */
    public function setEndDateTime(DateTimeInterface $endDateTime): self
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return $this
     */
    public function setExternalId(string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getAllotment(): ?int
    {
        return $this->allotment;
    }

    /**
     * @param int|null $allotment
     * @return $this
     */
    public function setAllotment(?int $allotment): self
    {
        $this->allotment = $allotment;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'rateGroupId' => $this->rateGroupId,
            'startDateTime' => $this->startDateTime ? $this->startDateTime->format(DATE_ISO8601) : null,
            'endDateTime' => $this->endDateTime ? $this->endDateTime->format(DATE_ISO8601) : null,
            'externalId' => $this->externalId,
            'allotment' => $this->allotment
        ];
    }
}
