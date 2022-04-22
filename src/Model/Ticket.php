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
     * @var DateTimeInterface
     */
    private $startDateTime;

    /**
     * @var DateTimeInterface
     */
    private $endDateTime;

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
     * @param DateTimeInterface $startDateTime
     * @param DateTimeInterface $endDateTime
     * @param DateTimeInterface $createdAt
     */
    public function __construct(
        string $id,
        ?string $number,
        string $status,
        Timeslot $timeslot,
        ?Customer $customer,
        DateTimeInterface $startDateTime,
        DateTimeInterface $endDateTime,
        DateTimeInterface $createdAt

    ) {
        $this->id = $id;
        $this->number = $number;
        $this->status = $status;
        $this->timeslot = $timeslot;
        $this->customer = $customer;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
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
     * @return DateTimeInterface
     */
    public function getStartDateTime(): DateTimeInterface
    {
        return $this->startDateTime;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEndDateTime(): DateTimeInterface
    {
        return $this->endDateTime;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }
}
