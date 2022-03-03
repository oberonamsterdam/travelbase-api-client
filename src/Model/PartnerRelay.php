<?php

namespace Oberon\TravelbaseClient\Model;

class PartnerRelay
{
    /**
     * @var BookingConnection|null
     */
    private $allBookings;

    /**
     * @var TicketConnection|null
     */
    private $allTickets;

    /**
     * PartnerRelay constructor.
     * @param BookingConnection|null $allBookings
     * @param TicketConnection|null $allTickets
     */
    public function __construct(
        ?BookingConnection $allBookings = null,
        ?TicketConnection $allTickets = null
    ) {
       $this->allBookings = $allBookings;
       $this->allTickets = $allTickets;
    }

    /**
     * @return BookingConnection|null
     */
    public function getAllBookings(): ?BookingConnection
    {
        return $this->allBookings;
    }

    /**
     * @return TicketConnection|null
     */
    public function getAllTickets(): ?TicketConnection
    {
        return $this->allTickets;
    }
}
