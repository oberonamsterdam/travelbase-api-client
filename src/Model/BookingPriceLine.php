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
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return self
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    /**
     * @param float|null $unitPrice
     * @return self
     */
    public function setUnitPrice(?float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModifier(): ?string
    {
        return $this->modifier;
    }

    /**
     * @param string|null $modifier
     * @return self
     */
    public function setModifier(?string $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     * @return self
     */
    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }
}
