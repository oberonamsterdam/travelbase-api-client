<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Model;

class AllotmentCollection implements InputInterface
{
    /**
     * @var Allotment[]
     */
    private $allotments = [];

    /**
     * @return Allotment[]
     */
    public function getAllotments(): array
    {
        return $this->allotments;
    }

    /**
     * @param Allotment[] $allotments
     * @return self
     */
    public function setAllotments(array $allotments): self
    {
        $this->allotments = $allotments;

        return $this;
    }

    /**
     * @param Allotment $allotment
     * @return self
     */
    public function addAllotment(Allotment $allotment): self
    {
        $this->allotments[] = $allotment;

        return  $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        foreach ($this->getAllotments() as $allotment) {
            $result['allotments'][] = $allotment->toArray();
        }

        return $result;
    }
}
