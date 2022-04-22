<?php

namespace Oberon\TravelbaseClient\Model;

class TicketConnection
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
     * @var TicketEdge[]
     */
    private $edges;

    /**
     * TicketConnection constructor.
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
     * @return TicketEdge[]
     */
    public function getEdges(): array
    {
        return $this->edges;
    }

    /**
     * @param TicketEdge $edge
     * @return $this
     */
    public function addEdge(TicketEdge $edge): self
    {
        $this->edges[] = $edge;

        return $this;
    }

    /**
     * @return Ticket[]
     */
    public function getNodes(): array
    {
        $tickets = [];
        foreach ($this->edges as $edge) {
            $tickets[] = $edge->getNode();
        }

        return $tickets;
    }
}
