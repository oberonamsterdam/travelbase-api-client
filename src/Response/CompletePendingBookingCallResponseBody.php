<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\CompletePendingBookingResult;

class CompletePendingBookingCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CompletePendingBookingResult
     */
    private $data;

    /**
     * CompletePendingBookingCallResponseBody constructor.
     * @param CompletePendingBookingResult $data
     */
    public function __construct(CompletePendingBookingResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return CompletePendingBookingResult
     */
    public function getData(): CompletePendingBookingResult
    {
        return $this->data;
    }
}
