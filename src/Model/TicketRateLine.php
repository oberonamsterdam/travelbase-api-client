<?php
/**
 * Date: 20-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Model;

class TicketRateLine
{

    /**
     * @var string|null
     */
    private $rateName;

    /**
     * @var float
     */
    private $unitPrice;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var Rate|null
     */
    private $rate;

    /**
     * BookingAddition constructor.
     * @param string|null $rateName
     * @param float $unitPrice
     * @param int $amount
     * @param Rate|null $rate
     */
    public function __construct(
        ?string $rateName,
        float $unitPrice,
        int $amount,
        ?Rate $rate
    ) {
        $this->rateName = $rateName;
        $this->unitPrice = $unitPrice;
        $this->amount = $amount;
        $this->rate = $rate;
    }

    /**
     * @return string|null
     */
    public function getRateName(): ?string
    {
        return $this->rateName;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return Rate|null
     */
    public function getRate(): ?Rate
    {
        return $this->rate;
    }
}
