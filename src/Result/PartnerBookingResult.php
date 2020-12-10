<?php
/**
 * Date: 06-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\PartnerBooking;

class PartnerBookingResult
{
    /**
     * @var PartnerBooking
     */
    public $partner;

    /**
     * PartnerBookingResult constructor.
     * @param PartnerBooking $partner
     */
    public function __construct(PartnerBooking $partner)
    {
        $this->partner = $partner;
    }

    /**
     * @return PartnerBooking
     */
    public function getPartner(): PartnerBooking
    {
        return $this->partner;
    }
}
