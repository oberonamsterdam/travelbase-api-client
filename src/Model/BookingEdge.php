<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Model;

class BookingEdge
{
    /**
     * @var string
     */
    private $cursor;

    /**
     * @var Booking
     */
    private $node;

    /**
     * BookingEdge constructor.
     * @param string $cursor
     * @param Booking $node
     */
    public function __construct(
        string $cursor,
        Booking $node
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
     * @return Booking
     */
    public function getNode(): Booking
    {
        return $this->node;
    }
}
