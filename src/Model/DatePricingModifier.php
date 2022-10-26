<?php

namespace Oberon\TravelbaseClient\Model;

use DateTimeInterface;

class DatePricingModifier implements InputInterface
{
    /**
     * Required attribute
     * @var DateTimeInterface
     */
    private $startDate;

    /**
     * Required attribute
     * @var DateTimeInterface
     */
    private $endDate;

    /**
     * Required attribute
     * @var int
     */
    private $minDuration;

    /**
     * Required attribute
     * @var int
     */
    private $maxDuration;

    /**
     * Required attribute
     * @var float
     */
    private $value;

    /**
     * Required attribute
     * @var string
     */
    private $valueType;

    /**
     * Required attribute
     * @var string
     */
    private $type;

    /**
     * @param DateTimeInterface|null $startDate --- Required
     * @param DateTimeInterface|null $endDate --- Required
     * @param int|null $minDuration --- Required
     * @param int|null $maxDuration --- Required
     * @param float|null $value --- Required
     * @param string|null $valueType --- Required
     * @param string|null $type --- Required
     */
    public function __construct(
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?int $minDuration = null,
        ?int $maxDuration = null,
        ?float $value = null,
        ?string $valueType = null,
        ?string $type = null
    ) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->minDuration = $minDuration;
        $this->maxDuration = $maxDuration;
        $this->value = $value;
        $this->valueType = $valueType;
        $this->type = $type;
    }


    /**
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param DateTimeInterface $startDate
     */
    public function setStartDate(DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEndDate(): DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param DateTimeInterface $endDate
     */
    public function setEndDate(DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getMinDuration(): int
    {
        return $this->minDuration;
    }

    /**
     * @param int $minDuration
     */
    public function setMinDuration(int $minDuration): void
    {
        $this->minDuration = $minDuration;
    }

    /**
     * @return int
     */
    public function getMaxDuration(): int
    {
        return $this->maxDuration;
    }

    /**
     * @param int $maxDuration
     */
    public function setMaxDuration(int $maxDuration): void
    {
        $this->maxDuration = $maxDuration;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValueType(): string
    {
        return $this->valueType;
    }

    /**
     * @param string $valueType
     */
    public function setValueType(string $valueType): void
    {
        $this->valueType = $valueType;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function toArray(): array
    {
        return [
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
            'minDuration' => $this->getMinDuration(),
            'maxDuration' => $this->getMaxDuration(),
            'value' => $this->getValue(),
            'valueType' => $this->getValueType(),
            'type' => $this->getType()
        ];
    }
}
