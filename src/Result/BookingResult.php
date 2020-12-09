<?php
/**
 * Date: 08-10-2020
 * @author Richard de Boer
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Result;

use Oberon\TravelbaseManagementApi\Model\Booking;

class BookingResult
{
    /**
     * @var Booking
     */
    public $booking;

    /**
     * BookingResult constructor.
     * @param Booking $booking
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * @return Booking
     */
    public function getBooking(): Booking
    {
        return $this->booking;
    }
}
