<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Model;

class PartnerBooking
{
    /**
     * @var BookingRelay
     */
    private $recentlyUpdatedBookings;

    /**
     * @var BookingRelay
     */
    private $upcomingBookings;

    /**
     * @var BookingRelay
     */
    private $allBookings;

    /**
     * @return BookingRelay
     */
    public function getRecentlyUpdatedBookings(): BookingRelay
    {
        return $this->recentlyUpdatedBookings;
    }

    /**
     * @param BookingRelay $recentlyUpdatedBookings
     * @return self
     */
    public function setRecentlyUpdatedBookings(BookingRelay $recentlyUpdatedBookings): self
    {
        $this->recentlyUpdatedBookings = $recentlyUpdatedBookings;

        return $this;
    }

    /**
     * @return BookingRelay
     */
    public function getUpcomingBookings(): BookingRelay
    {
        return $this->upcomingBookings;
    }

    /**
     * @param BookingRelay $upcomingBookings
     * @return self
     */
    public function setUpcomingBookings(BookingRelay $upcomingBookings): self
    {
        $this->upcomingBookings = $upcomingBookings;

        return $this;
    }

    /**
     * @return BookingRelay
     */
    public function getAllBookings(): BookingRelay
    {
        return $this->allBookings;
    }

    /**
     * @param BookingRelay $allBookings
     * @return self
     */
    public function setAllBookings(BookingRelay $allBookings): self
    {
        $this->allBookings = $allBookings;

        return $this;
    }
}
