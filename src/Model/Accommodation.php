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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return self
     */
    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return RentalUnit[]
     */
    public function getRentalUnits(): array
    {
        return $this->rentalUnits;
    }

    /**
     * @param RentalUnit[] $rentalUnits
     * @return self
     */
    public function setRentalUnits(array $rentalUnits): self
    {
        $this->rentalUnits = $rentalUnits;

        return $this;
    }

    /**
     * @param RentalUnit[] $rentalUnits
     * @return self
     */
    public function addRentalUnit(RentalUnit $rentalUnit): self
    {
        $this->rentalUnits[] = $rentalUnit;

        return $this;
    }
}
