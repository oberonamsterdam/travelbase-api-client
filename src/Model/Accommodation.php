<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace TOR\GraphQL\Model;

class Accommodation
{
    /**
     * @var string
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
     * @var RentalUnit[]
     */
    public $rentalUnits = [];

}
