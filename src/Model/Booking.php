<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Model;

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
    private $amountPets;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string|null
     */
    private $customerComment;

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * @var BookingAddition[]
     */
    private $additions = [];

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Address
     */
    private $invoiceAddress;

    /**
     * @var RentalUnit
     */
    private $rentalUnit;

    /**
     * @var float
     */
    private $accommodationSum;

    /**
     * @var float
     */
    private $totalPrice;

    /**
     * @var float
     */
    private $totalPricePaid;

    /**
     * @var float
     */
    private $deposit;

    /**
     * @var float
     */
    private $depositPaid;

    /**
     * @var float
     */
    private $touristTax;

    /**
     * @var float
     */
    private $touristTaxPaid;

    /**
     * @var Special|null
     */
    private $special;

    /**
     * Booking constructor.
     * @param string $id
     * @param string $number
     * @param DateTimeInterface $arrivalDate
     * @param DateTimeInterface $departureDate
     * @param int $duration
     * @param int $amountAdults
     * @param int $amountYouths
     * @param int $amountChildren
     * @param int $amountBabies
     * @param int $amountPets
     * @param string $status
     * @param string|null $customerComment
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     * @param BookingAddition[] $additions
     * @param Customer $customer
     * @param Address $invoiceAddress
     * @param RentalUnit $rentalUnit
     * @param float $accommodationSum
     * @param float $totalPrice
     * @param float $totalPricePaid
     * @param float $deposit
     * @param float $depositPaid
     * @param float $touristTax
     * @param float $touristTaxPaid
     * @param Special|null $special
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
        int $amountPets,
        string $status,
        ?string $customerComment,
        DateTimeInterface $createdAt,
        DateTimeInterface $updatedAt,
        array $additions,
        Customer $customer,
        Address $invoiceAddress,
        RentalUnit $rentalUnit,
        float $accommodationSum,
        float $totalPrice,
        float $totalPricePaid,
        float $deposit,
        float $depositPaid,
        float $touristTax,
        float $touristTaxPaid,
        Special $special
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
        $this->amountPets = $amountPets;
        $this->status = $status;
        $this->customerComment = $customerComment;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->additions = $additions;
        $this->customer = $customer;
        $this->invoiceAddress = $invoiceAddress;
        $this->rentalUnit = $rentalUnit;
        $this->accommodationSum = $accommodationSum;
        $this->totalPrice = $totalPrice;
        $this->totalPricePaid = $totalPricePaid;
        $this->deposit = $deposit;
        $this->depositPaid = $depositPaid;
        $this->touristTax = $touristTax;
        $this->touristTaxPaid = $touristTaxPaid;
        $this->special = $special;
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
    public function getAmountPets(): int
    {
        return $this->amountPets;
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
    public function getAccommodationSum(): float
    {
        return $this->accommodationSum;
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
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    /**
     * @return float
     */
    public function getTotalPricePaid(): float
    {
        return $this->totalPricePaid;
    }

    /**
     * @return float
     */
    public function getDeposit(): float
    {
        return $this->deposit;
    }

    /**
     * @return float
     */
    public function getDepositPaid(): float
    {
        return $this->depositPaid;
    }

    /**
     * @return float
     */
    public function getTouristTax(): float
    {
        return $this->touristTax;
    }

    /**
     * @return float
     */
    public function getTouristTaxPaid(): float
    {
        return $this->touristTaxPaid;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return Address
     */
    public function getInvoiceAddress(): Address
    {
        return $this->invoiceAddress;
    }

    /**
     * @return Special|null
     */
    public function getSpecial(): ?Special
    {
        return $this->special;
    }

    /**
     * @return BookingAddition[]
     */
    public function getAdditions(): array
    {
        return $this->additions;
    }

    /**
     * @param BookingAddition $bookingAddition
     * @return self
     */
    public function addAddition(BookingAddition $bookingAddition): self
    {
        $this->additions[] = $bookingAddition;

        return $this;
    }
}
