<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\BookingWrapper;

class CompletePendingBookingResult
{
    /**
     * @var BookingWrapper
     */
    public $completePendingBooking;

    /**
     * CompletePendingBookingResult constructor.
     * @param BookingWrapper $completePendingBooking
     */
    public function __construct(BookingWrapper $completePendingBooking)
    {
        $this->completePendingBooking = $completePendingBooking;
    }

    /**
     * @return BookingWrapper
     */
    public function getCompletePendingBooking(): BookingWrapper
    {
        return $this->completePendingBooking;
    }
}
