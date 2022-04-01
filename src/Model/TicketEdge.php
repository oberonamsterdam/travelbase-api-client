<?php

namespace Oberon\TravelbaseClient\Model;

class TicketEdge
{
    /**
     * @var string
     */
    private $cursor;

    /**
     * @var Ticket
     */
    private $node;

    /**
     * TicketEdge constructor.
     * @param string $cursor
     * @param Ticket $node
     */
    public function __construct(
        string $cursor,
        Ticket $node
    ) {
        $this->cursor = $cursor;
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function getCursor(): string
    {
        return $this->cursor;
    }

    /**
     * @return Ticket
     */
    public function getNode(): Ticket
    {
        return $this->node;
    }
}
