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
     * @var int
     */
    private $nightPrice;

    /**
     * Required attribute
     * @var int
     */
    private $weekPrice;

    /**
     * Required attribute
     * @var int
     */
    private $extraPersonPrice;

    /**
     * Required attribute
     * @var int
     */
    private $baseStayPrice;

    /**
     * Required attribute
     * @var int
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
     * @param int|null $nightPrice --- Required
     * @param int|null $weekPrice --- Required
     * @param int|null $extraPersonPrice --- Required
     * @param int|null $baseStayPrice --- Required
     * @param int|null $minimumStayPrice --- Required
     * @param int|null $minimumStayDuration --- Required
     * @param bool|null $arrivalAllowed --- Required
     * @param bool|null $departureAllowed --- Required
     */
    public function __construct(
        ?DateTimeInterface $date = null,
        ?int $nightPrice = null,
        ?int $weekPrice = null,
        ?int $extraPersonPrice = null,
        ?int $baseStayPrice = null,
        ?int $minimumStayPrice = null,
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
     * @return int
     */
    public function getNightPrice(): int
    {
        return $this->nightPrice;
    }

    /**
     * @param int $nightPrice
     */
    public function setNightPrice(int $nightPrice): void
    {
        $this->nightPrice = $nightPrice;
    }

    /**
     * @return int
     */
    public function getWeekPrice(): int
    {
        return $this->weekPrice;
    }

    /**
     * @param int $weekPrice
     */
    public function setWeekPrice(int $weekPrice): void
    {
        $this->weekPrice = $weekPrice;
    }

    /**
     * @return int
     */
    public function getExtraPersonPrice(): int
    {
        return $this->extraPersonPrice;
    }

    /**
     * @param int $extraPersonPrice
     */
    public function setExtraPersonPrice(int $extraPersonPrice): void
    {
        $this->extraPersonPrice = $extraPersonPrice;
    }

    /**
     * @return int
     */
    public function getBaseStayPrice(): int
    {
        return $this->baseStayPrice;
    }

    /**
     * @param int $baseStayPrice
     */
    public function setBaseStayPrice(int $baseStayPrice): void
    {
        $this->baseStayPrice = $baseStayPrice;
    }

    /**
     * @return int
     */
    public function getMinimumStayPrice(): int
    {
        return $this->minimumStayPrice;
    }

    /**
     * @param int $minimumStayPrice
     */
    public function setMinimumStayPrice(int $minimumStayPrice): void
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
            'departureAllowed' => $this->isDepartureAllowed()
        ];
    }
}
