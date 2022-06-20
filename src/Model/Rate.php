<?php
/**
 * Date: 20-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Model;

class Rate
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float|null
     */
    private $price;

    /**
     * Surcharge constructor.
     * @param string $id
     * @param string $name
     * @param float|null $price
     */
    public function __construct(
        string $id,
        string $name,
        ?float $price
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }
}
