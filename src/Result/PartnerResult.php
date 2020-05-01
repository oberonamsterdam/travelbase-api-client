<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Result;

use TOR\GraphQL\Model\Partner;

class PartnerResult
{
    /**
     * @var Partner
     */
    public $partner;

    /**
     * @return Partner
     */
    public function getPartner(): Partner
    {
        return $this->partner;
    }

    /**
     * @param Partner $partner
     * @return self
     */
    public function setPartner(Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }
}
