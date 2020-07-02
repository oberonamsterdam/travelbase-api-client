<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class BookingPriceLine
{
    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $label;

    /**
     * @var float|null
     */
    private $unitPrice;

    /**
     * @var string|null
     */
    private $modifier;

    /**
     * @var float
     */
    private $totalPrice;

    /**
     * BookingPriceLine constructor.
     * @param string $category
     * @param string $label
     * @param float|null $unitPrice
     * @param string|null $modifier
     * @param float $totalPrice
     */
    public function __construct(
        string $category,
        string $label,
        ?float $unitPrice,
        ?string $modifier,
        float $totalPrice
    ) {
        $this->category = $category;
        $this->label = $label;
        $this->unitPrice = $unitPrice;
        $this->modifier = $modifier;
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return float|null
     */
    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    /**
     * @return string|null
     */
    public function getModifier(): ?string
    {
        return $this->modifier;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }
}
