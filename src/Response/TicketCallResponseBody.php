<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\TicketResult;

class TicketCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var TicketResult
     */
    private $data;

    /**
     * TicketCallResponseBody constructor.
     * @param TicketResult $data
     */
    public function __construct(TicketResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return TicketResult
     */
    public function getData(): TicketResult
    {
        return $this->data;
    }
}
