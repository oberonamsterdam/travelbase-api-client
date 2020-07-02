<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class AllotmentCollection
{
    /**
     * @var Allotment[]
     */
    private $allotments = [];

    /**
     * AllotmentCollection constructor.
     * @param Allotment[] $allotments
     */
    public function __construct(array $allotments)
    {
        $this->allotments = $allotments;
    }

    /**
     * @return Allotment[]
     */
    public function getAllotments(): array
    {
        return $this->allotments;
    }

    /**
     * @param Allotment $allotment
     * @return self
     */
    private function addAllotment(Allotment $allotment): self
    {
        $this->allotments[] = $allotment;

        return  $this;
    }
}
