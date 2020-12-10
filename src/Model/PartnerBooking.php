<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Model;

class PartnerBooking
{
    /**
     * @var Booking[]
     */
    private $updatedBookings;

    /**
     * @var BookingConnection|null
     */
    private $allBookings;

    /**
     * PartnerBooking constructor.
     * @param Booking[] $updatedBookings
     * @param BookingConnection|null $allBookings
     */
    public function __construct(
        ?array $updatedBookings = [],
        ?BookingConnection $allBookings = null
    ) {
       $this->updatedBookings = $updatedBookings;
       $this->allBookings = $allBookings;
    }

    /**
     * @return BookingConnection
     */
    public function getAllBookings(): ?BookingConnection
    {
        return $this->allBookings;
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
