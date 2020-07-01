<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Result;

use Oberon\TorClient\Model\Partner;

class PartnersResult
{
    /**
     * @var Partner[]
     */
    public $partners = [];

    /**
     * @return Partner[]
     */
    public function getPartners(): array
    {
        return $this->partners;
    }

    /**
     * @param Partner[] $partners
     * @return PartnerCollection
     */
    public function setPartners(array $partners): self
    {
        $this->partners = $partners;

        return $this;
    }

    /**
     * @param Partner $partner
     * @return $this
     */
    public function addPartner(Partner $partner): self
    {
        $this->partners[] = $partner;

        return $this;
    }
}
