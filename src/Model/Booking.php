<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Model;

use DateTimeInterface;

class Booking
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $number;

    /**
     * @var DateTimeInterface
     */
    private $arrivalDate;

    /**
     * @var DateTimeInterface
     */
    private $departureDate;

    /**
     * @var int
     */
    private $duration;

    /**
     * @var int
     */
    private $amountAdults;

    /**
     * @var int
     */
    private $amountChildren;

    /**
     * @var int
     */
    private $amountBabies;

    /**
     * @var int
     */
    private $amountDogs;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string|null
     */
    private $customerComment;

    /**
     * @var float
     */
    private $rentalSum;

    /**
     * @var float
     */
    private $travelSum;

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * @var RentalUnit
     */
    private $rentalUnit;

    /**
     * @var BookingPriceLine[]
     */
    private $partnerPriceLines = [];

    /**
     * @var Order
     */
    private $order;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return self
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getArrivalDate(): DateTimeInterface
    {
        return $this->arrivalDate;
    }

    /**
     * @param DateTimeInterface $arrivalDate
     * @return self
     */
    public function setArrivalDate(DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDepartureDate(): DateTimeInterface
    {
        return $this->departureDate;
    }

    /**
     * @param DateTimeInterface $departureDate
     * @return self
     */
    public function setDepartureDate(DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

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
     * @return int
     */
    public function getAmountAdults(): int
    {
        return $this->amountAdults;
    }

    /**
     * @param int $amountAdults
     * @return self
     */
    public function setAmountAdults(int $amountAdults): self
    {
        $this->amountAdults = $amountAdults;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmountChildren(): int
    {
        return $this->amountChildren;
    }

    /**
     * @param int $amountChildren
     * @return self
     */
    public function setAmountChildren(int $amountChildren): self
    {
        $this->amountChildren = $amountChildren;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmountBabies(): int
    {
        return $this->amountBabies;
    }

    /**
     * @param int $amountBabies
     * @return self
     */
    public function setAmountBabies(int $amountBabies): self
    {
        $this->amountBabies = $amountBabies;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmountDogs(): int
    {
        return $this->amountDogs;
    }

    /**
     * @param int $amountDogs
     * @return self
     */
    public function setAmountDogs(int $amountDogs): self
    {
        $this->amountDogs = $amountDogs;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerComment(): ?string
    {
        return $this->customerComment;
    }

    /**
     * @param string|null $customerComment
     * @return self
     */
    public function setCustomerComment(?string $customerComment): self
    {
        $this->customerComment = $customerComment;

        return $this;
    }

    /**
     * @return float
     */
    public function getRentalSum(): float
    {
        return $this->rentalSum;
    }

    /**
     * @param float $rentalSum
     * @return self
     */
    public function setRentalSum(float $rentalSum): self
    {
        $this->rentalSum = $rentalSum;

        return $this;
    }

    /**
     * @return float
     */
    public function getTravelSum(): float
    {
        return $this->travelSum;
    }

    /**
     * @param float $travelSum
     * @return self
     */
    public function setTravelSum(float $travelSum): self
    {
        $this->travelSum = $travelSum;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface $createdAt
     * @return self
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface $updatedAt
     * @return self
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return RentalUnit
     */
    public function getRentalUnit(): RentalUnit
    {
        return $this->rentalUnit;
    }

    /**
     * @param RentalUnit $rentalUnit
     * @return self
     */
    public function setRentalUnit(RentalUnit $rentalUnit): self
    {
        $this->rentalUnit = $rentalUnit;

        return $this;
    }

    /**
     * @return BookingPriceLine[]
     */
    public function getPartnerPriceLines(): array
    {
        return $this->partnerPriceLines;
    }

    /**
     * @param BookingPriceLine[] $partnerPriceLines
     * @return self
     */
    public function setPartnerPriceLines(array $partnerPriceLines): self
    {
        $this->partnerPriceLines = $partnerPriceLines;

        return $this;
    }

    /**
     * @param BookingPriceLine $bookingPriceLine
     * @return self
     */
    public function addPartnerPriceLine(BookingPriceLine $bookingPriceLine): self 
    {
        $this->partnerPriceLines[] = $bookingPriceLine;
        
        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return self
     */
    public function setOrder(Order $order): self
    {
        $this->order = $order;

        return $this;
    }
}
