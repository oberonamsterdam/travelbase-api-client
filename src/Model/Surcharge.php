<?php
/**
 * Date: 18-09-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Model;

class Surcharge
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Surcharge constructor.
     * @param string $id
     * @param string $name
     */
    public function __construct(
        string $id,
        string $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
