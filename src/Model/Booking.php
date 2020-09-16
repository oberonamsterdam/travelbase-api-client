<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

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
    private $amountYouths;

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
     * @var Order
     */
    private $order;

    /**
     * @var BookingPriceLine[]
     */
    private $partnerPriceLines = [];

    /**
     * Booking constructor.
     * @param string $id
     * @param string $number
     * @param DateTimeInterface $arrivalDate
     * @param DateTimeInterface $departureDate
     * @param int $duration
     * @param int $amountAdults
     * @param int amountYouths
     * @param int $amountChildren
     * @param int $amountBabies
     * @param int $amountDogs
     * @param string $status
     * @param string|null $customerComment
     * @param float $rentalSum
     * @param float $travelSum
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     * @param RentalUnit $rentalUnit
     * @param Order $order
     * @param BookingPriceLine[] $partnerPriceLines
     */
    public function __construct(
        string $id,
        string $number,
        DateTimeInterface $arrivalDate,
        DateTimeInterface $departureDate,
        int $duration,
        int $amountAdults,
        int $amountYouths,
        int $amountChildren,
        int $amountBabies,
        int $amountDogs,
        string $status,
        ?string $customerComment,
        float $rentalSum,
        float $travelSum,
        DateTimeInterface $createdAt,
        DateTimeInterface $updatedAt,
        RentalUnit $rentalUnit,
        Order $order,
        array $partnerPriceLines
    ) {
        $this->id = $id;
        $this->number = $number;
        $this->arrivalDate = $arrivalDate;
        $this->departureDate = $departureDate;
        $this->duration = $duration;
        $this->amountAdults = $amountAdults;
        $this->amountChildren = $amountChildren;
        $this->amountBabies = $amountBabies;
        $this->amountYouths = $amountYouths;
        $this->amountDogs = $amountDogs;
        $this->status = $status;
        $this->customerComment = $customerComment;
        $this->rentalSum = $rentalSum;
        $this->travelSum = $travelSum;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->rentalUnit = $rentalUnit;
        $this->order = $order;
        $this->partnerPriceLines = $partnerPriceLines;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return DateTimeInterface
     */
    public function getArrivalDate(): DateTimeInterface
    {
        return $this->arrivalDate;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDepartureDate(): DateTimeInterface
    {
        return $this->departureDate;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return int
     */
    public function getAmountAdults(): int
    {
        return $this->amountAdults;
    }

    /**
     * @return int
     */
    public function getAmountYouths(): int
    {
        return $this->amountYouths;
    }

    /**
     * @return int
     */
    public function getAmountChildren(): int
    {
        return $this->amountChildren;
    }

    /**
     * @return int
     */
    public function getAmountBabies(): int
    {
        return $this->amountBabies;
    }

    /**
     * @return int
     */
    public function getAmountDogs(): int
    {
        return $this->amountDogs;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getCustomerComment(): ?string
    {
        return $this->customerComment;
    }

    /**
     * @return float
     */
    public function getRentalSum(): float
    {
        return $this->rentalSum;
    }

    /**
     * @return float
     */
    public function getTravelSum(): float
    {
        return $this->travelSum;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @return RentalUnit
     */
    public function getRentalUnit(): RentalUnit
    {
        return $this->rentalUnit;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @return BookingPriceLine[]
     */
    public function getPartnerPriceLines(): array
    {
        return $this->partnerPriceLines;
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
}
