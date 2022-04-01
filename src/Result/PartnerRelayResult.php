<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\PartnerRelay;

class PartnerRelayResult
{
    /**
     * @var PartnerRelay
     */
    public $partner;

    /**
     * PartnerRelayResult constructor.
     * @param PartnerRelay $partner
     */
    public function __construct(PartnerRelay $partner)
    {
        $this->partner = $partner;
    }

    /**
     * @return PartnerRelay
     */
    public function getPartner(): PartnerRelay
    {
        return $this->partner;
    }
}
