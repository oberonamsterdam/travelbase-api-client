<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class BookingAddition
{
    const CALCULATION_PER_PIECE = 'PER_PIECE';
    const CALCULATION_PER_PIECE_PER_NIGHT = 'PER_PERSON';
    const CALCULATION_PER_PERSON = 'PER_PERSON';
    const CALCULATION_PER_PERSON_PER_NIGH = 'PER_PERSON_PER_NIGHT';
    const CALCULATION_PER_PET = 'PER_PET';
    const CALCULATION_PER_PET_PER_NIGHT = 'PER_PET_PER_NIGHT';
    const CALCULATION_SUBSEQUENT = 'SUBSEQUENT';

    /**
     * @var float|null
     */
    private $unitPrice;

    /**
     * @var float
     */
    private $totalPrice;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $calculation;

    /**
     * @var Surcharge
     */
    private $surcharge;

    public function __construct(
        
    ) {
    }
}
