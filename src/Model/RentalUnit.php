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
     * RentalUnit constructor.
     * @param int $id
     * @param bool|null $enabled
     * @param string|null $name
     * @param string|null $code
     * @param string|null $type
     * @param int|null $maxAllotment
     * @param int|null $includedOccupancy
     */
    public function __construct(
        int $id,
        ?bool $enabled = null,
        ?string $name = null,
        ?string $code = null,
        ?string $type = null,
        ?int $maxAllotment = null,
        ?int $includedOccupancy  = null
    ) {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->name = $name;
        $this->code = $code;
        $this->type = $type;
        $this->maxAllotment = $maxAllotment;
        $this->includedOccupancy = $includedOccupancy;
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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getMaxAllotment(): int
    {
        return $this->maxAllotment;
    }

    /**
     * @return int
     */
    public function getIncludedOccupancy(): int
    {
        return $this->includedOccupancy;
    }
}
