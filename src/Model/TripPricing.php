<?php
/**
 * Date: 01-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Model;

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
     * @var float|null
     */
    private $extraPersonPrice;

    /**
     * @var float|null
     */
    private $minimumStayPrice;

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
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
     * @return int
     */
    public function getDuration(): int
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
     * @return float
     */
    public function getPrice(): float
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
     * @return float
     */
    public function getExtraPersonPrice(): ?float
    {
        return $this->extraPersonPrice;
    }

    /**
     * @param float $extraPersonPrice
     * @return self
     */
    public function setExtraPersonPrice(?float $extraPersonPrice): self
    {
        $this->extraPersonPrice = $extraPersonPrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getMinimumStayPrice(): ?float
    {
        return $this->minimumStayPrice;
    }

    /**
     * @param float $minimumStayPrice
     * @return self
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
        $result =  [
            'date' => $this->getDate()->format('Y-m-d'),
            'duration' => $this->getDuration(),
            'price' => $this->getPrice(),
        ];
        if ($this->getExtraPersonPrice()) {
            $result['extraPersonPrice'] = $this->getExtraPersonPrice();
        }

        if ($this->getMinimumStayPrice()) {
            $result['minimumStayPrice'] = $this->getMinimumStayPrice();
        }

        return $result;
    }

}
