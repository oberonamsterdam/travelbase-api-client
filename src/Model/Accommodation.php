<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace Oberon\TravelbaseManagementApi\Model;

class Accommodation
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var string
     */
    private $name;

    /**
     * @var RentalUnit[]
     */
    private $rentalUnits = [];

    /**
     * Accommodation constructor.
     * @param string $id
     * @param bool $enabled
     * @param string $name
     * @param array $rentalUnits
     */
    public function __construct(
        string $id,
        bool $enabled,
        string $name,
        array $rentalUnits
    ) {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->name = $name;
        $this->rentalUnits = $rentalUnits;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return RentalUnit[]
     */
    public function getRentalUnits(): array
    {
        return $this->rentalUnits;
    }

    /**
     * @param RentalUnit $rentalUnit
     * @return self
     */
    private function addRentalUnit(RentalUnit $rentalUnit): self
    {
        $this->rentalUnits[] = $rentalUnit;

        return $this;
    }
}
