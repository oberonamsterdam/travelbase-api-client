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
     * @var BookingConnection
     */
    private $recentlyUpdatedBookings;

    /**
     * @var BookingConnection
     */
    private $upcomingBookings;

    /**
     * @var BookingConnection
     */
    private $allBookings;

    /**
     * @return BookingConnection
     */
    public function getRecentlyUpdatedBookings(): BookingConnection
    {
        return $this->recentlyUpdatedBookings;
    }

    /**
     * @param BookingConnection $recentlyUpdatedBookings
     * @return self
     */
    public function setRecentlyUpdatedBookings(BookingConnection $recentlyUpdatedBookings): self
    {
        $this->recentlyUpdatedBookings = $recentlyUpdatedBookings;

        return $this;
    }

    /**
     * @return BookingConnection
     */
    public function getUpcomingBookings(): BookingConnection
    {
        return $this->upcomingBookings;
    }

    /**
     * @param BookingConnection $upcomingBookings
     * @return self
     */
    public function setUpcomingBookings(BookingConnection $upcomingBookings): self
    {
        $this->upcomingBookings = $upcomingBookings;

        return $this;
    }

    /**
     * @return BookingConnection
     */
    public function getAllBookings(): BookingConnection
    {
        return $this->allBookings;
    }

    /**
     * @param BookingConnection $allBookings
     * @return self
     */
    public function setAllBookings(BookingConnection $allBookings): self
    {
        $this->allBookings = $allBookings;

        return $this;
    }
}
