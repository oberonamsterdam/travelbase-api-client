<?php

namespace Oberon\TravelbaseClient\Model;

use DateTimeInterface;

class DatePricing implements InputInterface
{
    /**
     * Required attribute
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Required attribute
     * @var float
     */
    private $nightPrice;

    /**
     * Required attribute
     * @var float
     */
    private $weekPrice;

    /**
     * Required attribute
     * @var float
     */
    private $extraPersonPrice;

    /**
     * Required attribute
     * @var float
     */
    private $baseStayPrice;

    /**
     * Required attribute
     * @var float
     */
    private $minimumStayPrice;

    /**
     * Required attribute
     * @var int
     */
    private $minimumStayDuration;

    /**
     * Required attribute
     * @var bool
     */
    private $arrivalAllowed;

    /**
     * Required attribute
     * @var bool
     */
    private $departureAllowed;

    /**
     * @param DateTimeInterface|null $date --- Required
     * @param float|null $nightPrice --- Required
     * @param float|null $weekPrice --- Required
     * @param float|null $extraPersonPrice --- Required
     * @param float|null $baseStayPrice --- Required
     * @param float|null $minimumStayPrice --- Required
     * @param int|null $minimumStayDuration --- Required
     * @param bool|null $arrivalAllowed --- Required
     * @param bool|null $departureAllowed --- Required
     */
    public function __construct(
        ?DateTimeInterface $date = null,
        ?float $nightPrice = null,
        ?float $weekPrice = null,
        ?float $extraPersonPrice = null,
        ?float $baseStayPrice = null,
        ?float $minimumStayPrice = null,
        ?int $minimumStayDuration = null,
        ?bool $arrivalAllowed = null,
        ?bool $departureAllowed = null
    ) {
        $this->date = $date;
        $this->nightPrice = $nightPrice;
        $this->weekPrice = $weekPrice;
        $this->extraPersonPrice = $extraPersonPrice;
        $this->baseStayPrice = $baseStayPrice;
        $this->minimumStayPrice = $minimumStayPrice;
        $this->minimumStayDuration = $minimumStayDuration;
        $this->arrivalAllowed = $arrivalAllowed;
        $this->departureAllowed = $departureAllowed;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return float
     */
    public function getNightPrice(): float
    {
        return $this->nightPrice;
    }

    /**
     * @param float $nightPrice
     */
    public function setNightPrice(float $nightPrice): void
    {
        $this->nightPrice = $nightPrice;
    }

    /**
     * @return float
     */
    public function getWeekPrice(): float
    {
        return $this->weekPrice;
    }

    /**
     * @param float $weekPrice
     */
    public function setWeekPrice(float $weekPrice): void
    {
        $this->weekPrice = $weekPrice;
    }

    /**
     * @return float
     */
    public function getExtraPersonPrice(): float
    {
        return $this->extraPersonPrice;
    }

    /**
     * @param float $extraPersonPrice
     */
    public function setExtraPersonPrice(float $extraPersonPrice): void
    {
        $this->extraPersonPrice = $extraPersonPrice;
    }

    /**
     * @return float
     */
    public function getBaseStayPrice(): float
    {
        return $this->baseStayPrice;
    }

    /**
     * @param float $baseStayPrice
     */
    public function setBaseStayPrice(float $baseStayPrice): void
    {
        $this->baseStayPrice = $baseStayPrice;
    }

    /**
     * @return float
     */
    public function getMinimumStayPrice(): float
    {
        return $this->minimumStayPrice;
    }

    /**
     * @param float $minimumStayPrice
     */
    public function setMinimumStayPrice(float $minimumStayPrice): void
    {
        $this->minimumStayPrice = $minimumStayPrice;
    }

    /**
     * @return int
     */
    public function getMinimumStayDuration(): int
    {
        return $this->minimumStayDuration;
    }

    /**
     * @param int $minimumStayDuration
     */
    public function setMinimumStayDuration(int $minimumStayDuration): void
    {
        $this->minimumStayDuration = $minimumStayDuration;
    }

    /**
     * @return bool
     */
    public function isArrivalAllowed(): bool
    {
        return $this->arrivalAllowed;
    }

    /**
     * @param bool $arrivalAllowed
     */
    public function setArrivalAllowed(bool $arrivalAllowed): void
    {
        $this->arrivalAllowed = $arrivalAllowed;
    }

    /**
     * @return bool
     */
    public function isDepartureAllowed(): bool
    {
        return $this->departureAllowed;
    }

    /**
     * @param bool $departureAllowed
     */
    public function setDepartureAllowed(bool $departureAllowed): void
    {
        $this->departureAllowed = $departureAllowed;
    }

    public function toArray(): array
    {
        return [
            'date' => $this->getDate()->format('Y-m-d'),
            'nightPrice' => $this->getNightPrice(),
            'weekPrice' => $this->getWeekPrice(),
            'extraPersonPrice' => $this->getExtraPersonPrice(),
            'baseStayPrice' => $this->getBaseStayPrice(),
            'minimumStayPrice' => $this->getMinimumStayPrice(),
            'minimumStayDuration' => $this->getMinimumStayDuration(),
            'arrivalAllowed' => $this->isArrivalAllowed(),
            'departureAllowed' => $this->isDepartureAllowed(),
        ];
    }
}
