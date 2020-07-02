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
     * @var BookingConnection|null
     */
    private $recentlyUpdatedBookings;

    /**
     * @var BookingConnection|null
     */
    private $upcomingBookings;

    /**
     * @var BookingConnection|null
     */
    private $allBookings;

    /**
     * PartnerBooking constructor.
     * @param BookingConnection|null $recentlyUpdatedBookings
     * @param BookingConnection|null $upcomingBookings
     * @param BookingConnection|null $allBookings
     */
    public function __construct(
        ?BookingConnection $recentlyUpdatedBookings = null,
        ?BookingConnection $upcomingBookings = null,
        ?BookingConnection $allBookings = null
    ) {
       $this->recentlyUpdatedBookings = $recentlyUpdatedBookings;
       $this->upcomingBookings = $upcomingBookings;
       $this->allBookings = $allBookings;
    }

    /**
     * @return BookingConnection
     */
    public function getRecentlyUpdatedBookings(): ?BookingConnection
    {
        return $this->recentlyUpdatedBookings;
    }

    /**
     * @return BookingConnection
     */
    public function getUpcomingBookings(): ?BookingConnection
    {
        return $this->upcomingBookings;
    }

    /**
     * @return BookingConnection
     */
    public function getAllBookings(): ?BookingConnection
    {
        return $this->allBookings;
    }
}
