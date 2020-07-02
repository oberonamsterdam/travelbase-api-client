<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class Partner
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
    private $companyName;

    /**
     * @var Accommodation[]
     */
    private $accommodations = [];

    /**
     * Partner constructor.
     * @param int $id
     * @param bool $enabled
     * @param string $companyName
     * @param Accommodation[] $accommodations
     */
    public function __construct(
        int $id,
        bool $enabled,
        string $companyName,
        array $accommodations
    ) {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->companyName = $companyName;
        $this->accommodations = $accommodations;
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
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return Accommodation[]
     */
    public function getAccommodations(): array
    {
        return $this->accommodations;
    }

    /**
     * @param Accommodation $accommodation
     * @return $this
     */
    private function addAccommodation(Accommodation $accommodation): self
    {
        $this->accommodations[] = $accommodation;

        return $this;
    }
}
