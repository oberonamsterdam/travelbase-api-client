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
     * ActivityRateGroup constructor.
     * @param string $id
     * @param string $name
     * @param bool $canBuyTickets
     */
    public function __construct(
        string $id,
        string $name,
        bool $canBuyTickets
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->canBuyTickets = $canBuyTickets;
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
}
