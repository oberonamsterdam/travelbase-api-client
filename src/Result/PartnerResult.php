<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\Partner;

class PartnerResult
{
    /**
     * @var Partner
     */
    public $partner;

    /**
     * PartnerResult constructor.
     * @param Partner $partner
     */
    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }

    /**
     * @return Partner
     */
    public function getPartner(): Partner
    {
        return $this->partner;
    }
}
