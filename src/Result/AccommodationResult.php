<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Result;

use Oberon\TorClient\Model\Accommodation;

class AccommodationResult
{
    /**
     * @var Accommodation
     */
    public $accommodation;

    /**
     * @return Accommodation
     */
    public function getAccommodation(): Accommodation
    {
        return $this->accommodation;
    }

    /**
     * @param Accommodation $accommodation
     * @return self
     */
    public function setAccommodation(Accommodation $accommodation): self
    {
        $this->accommodation = $accommodation;

        return $this;
    }
}
