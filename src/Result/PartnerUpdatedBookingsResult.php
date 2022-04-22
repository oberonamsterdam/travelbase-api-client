<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\PartnerUpdatedBookings;

class PartnerUpdatedBookingsResult
{
    /**
     * @var PartnerUpdatedBookings
     */
    public $partner;

    /**
     * PartnerBookingsUpdateResult constructor.
     * @param PartnerUpdatedBookings $partner
     */
    public function __construct(PartnerUpdatedBookings $partner)
    {
        $this->partner = $partner;
    }

    /**
     * @return PartnerUpdatedBookings
     */
    public function getPartner(): PartnerUpdatedBookings
    {
        return $this->partner;
    }
}
