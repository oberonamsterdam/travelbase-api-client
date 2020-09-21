<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class PartnerBooking
{
    /**
     * @var Booking[]
     */
    private $updatedBookingsSince;

    /**
     * @var BookingConnection|null
     */
    private $allBookings;

    /**
     * PartnerBooking constructor.
     * @param Booking[] $updatedBookingsSince
     * @param BookingConnection|null $upcomingBookings
     * @param BookingConnection|null $allBookings
     */
    public function __construct(
        ?array $updatedBookingsSince = null,
        ?BookingConnection $allBookings = null
    ) {
       $this->updatedBookingsSince = $updatedBookingsSince;
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
    public function getUpdatedBookingsSince(): array
    {
        return $this->updatedBookingsSince;
    }

    /**
     * @param Booking $booking
     * @return $this
     */
    public function addUpdatedBookingsSince(Booking $booking): self
    {
        $this->updatedBookingsSince[] = $booking;

        return $this;
    }
}
