<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\Ticket;

class TicketResult
{
    /**
     * @var Ticket
     */
    public $ticket;

    /**
     * TicketResult constructor.
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return Ticket
     */
    public function getTicket(): Ticket
    {
        return $this->ticket;
    }
}
