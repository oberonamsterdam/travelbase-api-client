<?php

namespace Oberon\TravelbaseClient\Model;

use DateTimeInterface;

class Ticket
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $number;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Timeslot
     */
    private $timeslot;

    /**
     * @var Customer|null
     */
    private $customer;

    /**
     * @var TicketRateLine[]
     */
    private $rateLines = [];

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * Ticket constructor
     * @param string $id
     * @param string|null $number
     * @param string $status
     * @param Timeslot $timeslot
     * @param Customer|null $customer
     * @param TicketRateLine[] $rateLines
     * @param DateTimeInterface $createdAt
     */
    public function __construct(
        string $id,
        ?string $number,
        string $status,
        Timeslot $timeslot,
        ?Customer $customer,
        array $rateLines,
        DateTimeInterface $createdAt

    ) {
        $this->id = $id;
        $this->number = $number;
        $this->status = $status;
        $this->timeslot = $timeslot;
        $this->customer = $customer;
        $this->rateLines = $rateLines;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return Timeslot
     */
    public function getTimeslot(): Timeslot
    {
        return $this->timeslot;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @return TicketRateLine[]
     */
    public function getRateLines(): array
    {
        return $this->rateLines;
    }

    /**
     * @param TicketRateLine $rateLine
     * @return self
     */
    public function addRateLine(TicketRateLine $rateLine): self
    {
        $this->rateLines[] = $rateLine;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }
}
