<?php

namespace Oberon\TravelbaseClient\Model;

class BookingWrapper
{
    /**
     * @var Booking
     */
    private $booking;

    /**
     * BookingWrapper constructor.
     * @param Booking $booking
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function getBooking(): Booking
    {
        return $this->booking;
    }
}
