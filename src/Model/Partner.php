<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Model;

class Partner
{
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
    public $companyName;

    /**
     * @var Accommodation[]
     */
    public $accommodations = [];
}
