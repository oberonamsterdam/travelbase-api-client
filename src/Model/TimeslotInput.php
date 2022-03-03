<?php

namespace Oberon\TravelbaseClient\Model;

use DateTimeInterface;

class TimeslotInput implements InputInterface
{
    /**
     * @var int|null
     */
    private $rateGroupId;

    /**
     * @var DateTimeInterface|null
     */
    private $startDateTime;

    /**
     * @var DateTimeInterface|null
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
     * @var TimeslotTranslation[]
     */
    private $translations;

    /**
     * TimeslotInput constructor
     * @param int|null $rateGroupId
     * @param DateTimeInterface|null $startDateTime
     * @param DateTimeInterface|null $endDateTime
     * @param int|null $allotment
     * @param string|null $externalId
     * @param array $translations
     */
    public function __construct(
        ?int $rateGroupId = null,
        ?DateTimeInterface $startDateTime = null,
        ?DateTimeInterface $endDateTime = null,
        ?int $allotment = null,
        ?string $externalId = null,
        array $translations = []
    ) {
        $this->rateGroupId = $rateGroupId;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->allotment = $allotment;
        $this->externalId = $externalId;
        $this->translations = $translations;
    }

    public function getRateGroupId(): ?string
    {
        return $this->rateGroupId;
    }

    /**
     * @param int|null $rateGroupId
     * @return $this
     */
    public function setRateGroupId(?int $rateGroupId): self
    {
        $this->rateGroupId = $rateGroupId;

        return $this;
    }

    public function getStartDateTime(): ?DateTimeInterface
    {
        return $this->startDateTime;
    }

    /**
     * @param DateTimeInterface|null $startDateTime
     * @return $this
     */
    public function setStartDateTime(?DateTimeInterface $startDateTime): self
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): ?DateTimeInterface
    {
        return $this->endDateTime;
    }

    /**
     * @param DateTimeInterface|null $endDateTime
     * @return $this
     */
    public function setEndDateTime(?DateTimeInterface $endDateTime): self
    {
        $this->endDateTime = $endDateTime;

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

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param string|null $externalId
     * @return $this
     */
    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return TimeslotTranslation[]
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @param TimeslotTranslation[] $translations
     * @return $this
     */
    public function setTranslations(array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @param TimeslotTranslation $timeslotTranslation
     * @return $this
     */
    public function addTranslation(TimeslotTranslation $timeslotTranslation): self
    {
        $this->translations[] = $timeslotTranslation;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $translations = [];
        foreach ($this->translations as $translation) {
            $translations[] = $translation->toArray();
        }

        return [
            'rateGroupId' => $this->rateGroupId,
            'startDateTime' => $this->startDateTime ? $this->startDateTime->format('Y-m-d') : null,
            'endDateTime' => $this->endDateTime ? $this->endDateTime->format('Y-m-d') : null,
            'allotment' => $this->allotment,
            'externalId' => $this->externalId,
            'translations' => $translations
        ];
    }
}
