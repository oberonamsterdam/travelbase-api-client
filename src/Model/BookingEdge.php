<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

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
     * @return string
     */
    public function getCursor(): string
    {
        return $this->cursor;
    }

    /**
     * @param string $cursor
     * @return self
     */
    public function setCursor(string $cursor): self
    {
        $this->cursor = $cursor;

        return $this;
    }

    /**
     * @return Booking
     */
    public function getNode(): Booking
    {
        return $this->node;
    }

    /**
     * @param Booking $node
     * @return self
     */
    public function setNode(Booking $node): self
    {
        $this->node = $node;

        return $this;
    }

}
