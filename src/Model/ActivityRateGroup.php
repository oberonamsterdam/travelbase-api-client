<?php

namespace Oberon\TravelbaseClient\Model;

class ActivityRateGroup
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
     * @var bool
     */
    private $canBuyTickets;

    /**
     * @var Rate[]
     */
    private $rates;

    /**
     * ActivityRateGroup constructor.
     * @param string $id
     * @param string $name
     * @param bool $canBuyTickets
     * @param Rate[] $rates
     */
    public function __construct(
        string $id,
        string $name,
        bool $canBuyTickets,
        array $rates
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->canBuyTickets = $canBuyTickets;
        $this->rates = $rates;
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
     * @return bool
     */
    public function isCanBuyTickets(): bool
    {
        return $this->canBuyTickets;
    }

    /**
     * @return Rate[]
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @param Rate $rate
     * @return self
     */
    public function addRate(Rate $rate): self
    {
        $this->rates[] = $rate;

        return $this;
    }
}
