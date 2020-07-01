<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace Oberon\TorClient\Model;

class RentalUnit
{
    const TYPE_HOME = 'home';
    const TYPE_CAMPING_PITCH = 'camping-pitch';
    const TYPE_ROOM = 'room';
    const TYPE_TENT = 'tent';
    const TYPE_BED = 'bed';
    const TYPE_CAMPER_SPOT = 'camper-spot';

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
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $maxAllotment;

    /**
     * @var int
     */
    private $includedOccupancy;

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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxAllotment(): int
    {
        return $this->maxAllotment;
    }

    /**
     * @param int $maxAllotment
     * @return self
     */
    public function setMaxAllotment(int $maxAllotment): self
    {
        $this->maxAllotment = $maxAllotment;

        return $this;
    }

    /**
     * @return int
     */
    public function isIncludedOccupancy(): bool
    {
        return $this->includedOccupancy;
    }

    /**
     * @param int $includedOccupancy
     * @return self
     */
    public function setIncludedOccupancy(int $includedOccupancy): self
    {
        $this->includedOccupancy = $includedOccupancy;

        return $this;
    }
}
