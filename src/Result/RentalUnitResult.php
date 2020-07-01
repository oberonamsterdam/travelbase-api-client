<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Result;

use Oberon\TorClient\Model\RentalUnit;

class RentalUnitResult
{
    /**
     * @var RentalUnit
     */
    public $rentalUnit;

    /**
     * @return RentalUnit
     */
    public function getRentalUnit(): RentalUnit
    {
        return $this->rentalUnit;
    }

    /**
     * @param RentalUnit $rentalUnit
     * @return self
     */
    public function setRentalUnit(RentalUnit $rentalUnit): self
    {
        $this->rentalUnit = $rentalUnit;

        return $this;
    }
}
