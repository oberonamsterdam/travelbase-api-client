<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace TOR\GraphQL\Model;

class RentalUnit
{
    const TYPE_HOME = 'home';
    const TYPE_CAMPING_PITCH = 'camping-pitch';
    const TYPE_ROOM = 'room';
    const TYPE_TENT = 'tent';
    const TYPE_BED = 'bed';
    const TYPE_CAMPER_SPOT = 'camper-spot';

    /**
     * @var int
     */
    public $id;

    /**
     * @var bool
     */
    public $enabled;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $maxAllotment;

    /**
     * @var bool
     */
    public $includeOccupancy;
}
