<?php
/**
 * Date: 01-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Model;

use \DateTimeInterface;

class TripPricing implements InputInterface
{
    /**
     * @var DateTimeInterface
     */
    private $date;

    /**
     * @var int
     */
    private $duration;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $extraPersonPrice;

    /**
     * @var float
     */
    private $minimumStayPrice;

    /**
     * TripPricing constructor.
     * @param DateTimeInterface|null $date
     * @param int|null $duration
     * @param float|null $price
     * @param float|null $extraPersonPrice
     * @param float|null $minimumStayPrice
     */
    public function __construct(
        ?DateTimeInterface $date = null,
        ?int $duration = null,
        ?float $price = null,
        ?float $extraPersonPrice = null,
        ?float $minimumStayPrice = null
    ) {
        $this->date = $date;
        $this->duration = $duration;
        $this->price = $price;
        $this->extraPersonPrice = $extraPersonPrice;
        $this->minimumStayPrice = $minimumStayPrice;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     * @return self
     */
    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return self
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getExtraPersonPrice(): ?float
    {
        return $this->extraPersonPrice;
    }

    /**
     * @param float|null $extraPersonPrice
     * @return $this
     */
    public function setExtraPersonPrice(?float $extraPersonPrice): self
    {
        $this->extraPersonPrice = $extraPersonPrice;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMinimumStayPrice(): ?float
    {
        return $this->minimumStayPrice;
    }

    /**
     * @param float|null $minimumStayPrice
     * @return $this
     */
    public function setMinimumStayPrice(?float $minimumStayPrice): self
    {
        $this->minimumStayPrice = $minimumStayPrice;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'date' => $this->getDate()->format('Y-m-d'),
            'duration' => $this->getDuration(),
            'price' => $this->getPrice(),
            'extraPersonPrice' => $this->getExtraPersonPrice(),
            'minimumStayPrice' => $this->getMinimumStayPrice(),
        ];
    }
}
