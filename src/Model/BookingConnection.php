<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class BookingConnection
{
    /**
     * @var int
     */
    private $totalCount;

    /**
     * @var PageInfo
     */
    private $pageInfo;

    /**
     * @var BookingEdge[]
     */
    private $edges;

    /**
     * BookingConnection constructor.
     * @param int $totalCount
     * @param PageInfo $pageInfo
     * @param array $edges
     */
    public function __construct(
        int $totalCount,
        PageInfo $pageInfo,
        array $edges
    ) {
        $this->totalCount = $totalCount;
        $this->pageInfo = $pageInfo;
        $this->edges = $edges;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @return PageInfo
     */
    public function getPageInfo(): PageInfo
    {
        return $this->pageInfo;
    }

    /**
     * @return BookingEdge[]
     */
    public function getEdges(): array
    {
        return $this->edges;
    }

    /**
     * @param BookingEdge $edge
     * @return $this
     */
    public function addEdge(BookingEdge $edge): self
    {
        $this->edges[] = $edge;

        return $this;
    }

    /**
     * @return Booking[]
     */
    public function getNodes(): array
    {
        $bookings = [];
        foreach ($this->edges as $edge) {
            $bookings[] = $edge->getNode();
        }

        return $bookings;
    }
}
