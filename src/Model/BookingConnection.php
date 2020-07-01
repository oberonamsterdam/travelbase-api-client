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
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     * @return self
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * @return PageInfo
     */
    public function getPageInfo(): PageInfo
    {
        return $this->pageInfo;
    }

    /**
     * @param PageInfo $pageInfo
     * @return self
     */
    public function setPageInfo(PageInfo $pageInfo): self
    {
        $this->pageInfo = $pageInfo;

        return $this;
    }

    /**
     * @return BookingEdge[]
     */
    public function getEdges(): array
    {
        return $this->edges;
    }

    /**
     * @param BookingEdge[] $edges
     * @return self
     */
    public function setEdges(array $edges): self
    {
        $this->edges = $edges;

        return $this;
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
