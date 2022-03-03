<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Model;

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
    private $name;

    /**
     * @var Accommodation[]
     */
    private $accommodations = [];

    /**
     * @var Company[]
     */
    private $companies = [];

    /**
     * Partner constructor.
     * @param string $id
     * @param bool $enabled
     * @param string $name
     * @param Accommodation[] $accommodations
     * @param Company[] $companies
     */
    public function __construct(
        string $id,
        bool $enabled,
        string $name,
        array $accommodations,
        array $companies
    ) {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->name = $name;
        $this->accommodations = $accommodations;
        $this->companies = $companies;
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
    /**
     * @return Company[]
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }

    /**
     * @param Company $company
     * @return $this
     */
    private function addCompany(Company $company): self
    {
        $this->companies[] = $company;

        return $this;
    }
}
