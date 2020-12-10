<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\Accommodation;

class AccommodationResult
{
    /**
     * @var Accommodation
     */
    public $accommodation;

    /**
     * AccommodationResult constructor.
     * @param Accommodation $accommodation
     */
    public function __construct(Accommodation $accommodation)
    {
        $this->accommodation = $accommodation;
    }

    /**
     * @return Accommodation
     */
    public function getAccommodation(): Accommodation
    {
        return $this->accommodation;
    }
}
