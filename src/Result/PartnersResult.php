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
     * PartnersResult constructor
     * @var Partner[] $partners
     */
    public function __construct(array $partners)
    {
        $this->partners = $partners;
    }

    /**
     * @return Partner[]
     */
    public function getPartners(): array
    {
        return $this->partners;
    }

    /**
     * @param Partner $partner
     * @return $this
     */
    private function addPartner(Partner $partner): self
    {
        $this->partners[] = $partner;

        return $this;
    }
}
