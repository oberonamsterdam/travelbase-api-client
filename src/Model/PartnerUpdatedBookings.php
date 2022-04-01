<?php

namespace Oberon\TravelbaseClient\Model;

class PartnerUpdatedBookings
{
    /**
     * @var Booking[]
     */
    private $updatedBookings;

    /**
     * PartnerUpdatedBookings constructor.
     * @param Booking[] $updatedBookings
     */
    public function __construct(
        ?array $updatedBookings = [],
    ) {
        $this->updatedBookings = $updatedBookings;
    }

    /**
     * @return Booking[]
     */
    public function getUpdatedBookings(): array
    {
        return $this->updatedBookings;
    }

    /**
     * @param Booking $booking
     * @return $this
     */
    public function addUpdatedBooking(Booking $booking): self
    {
        $this->updatedBookings[] = $booking;

        return $this;
    }
}
