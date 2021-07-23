<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Model;

class BookingAddition
{
    const CALCULATION_PER_PIECE = 'PER_PIECE';
    const CALCULATION_PER_PIECE_PER_NIGHT = 'PER_PIECE_PER_NIGHT';
    const CALCULATION_PER_PERSON = 'PER_PERSON';
    const CALCULATION_PER_PERSON_PER_NIGH = 'PER_PERSON_PER_NIGHT';
    const CALCULATION_PER_PET = 'PER_PET';
    const CALCULATION_PER_PET_PER_NIGHT = 'PER_PET_PER_NIGHT';
    const CALCULATION_SUBSEQUENT = 'SUBSEQUENT';

    /**
     * @var string
     */
    private $title;

    /**
     * @var float
     */
    private $totalPrice;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $calculation;

    /**
     * @var Surcharge|null
     */
    private $surcharge;

    /**
     * BookingAddition constructor.
     * @param string $title
     * @param float|null $unitPrice
     * @param float $totalPrice
     * @param int $amount
     * @param string $calculation
     * @param Surcharge|null $surcharge
     */
    public function __construct(
        string $title,
        ?float $unitPrice,
        float $totalPrice,
        int $amount,
        string $calculation,
        ?Surcharge $surcharge
    ) {
        $this->title = $title;
        $this->unitPrice = $unitPrice;
        $this->totalPrice = $totalPrice;
        $this->amount = $amount;
        $this->calculation = $calculation;
        $this->surcharge = $surcharge;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return float|null
     */
    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCalculation(): string
    {
        return $this->calculation;
    }

    /**
     * @return Surcharge|null
     */
    public function getSurcharge(): ?Surcharge
    {
        return $this->surcharge;
    }
}
