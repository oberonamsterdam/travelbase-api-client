<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class Address
{
    /**
     * @var string|null
     */
    private $street;

    /**
     * @var string|null
     */
    private $number;

    /**
     * @var string|null
     */
    private $postalCode;

    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $countryName;

    /**
     * Address constructor.
     * @param string|null $street
     * @param string|null $number
     * @param string|null $postalCode
     * @param string|null $countryCode
     * @param string|null $countryName
     */
    public function __construct(
        ?string $street,
        ?string $number,
        ?string $postalCode,
        ?string $countryCode,
        ?string $countryName
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->postalCode = $postalCode;
        $this->countryCode = $countryCode;
        $this->countryName = $countryName;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @return string|null
     */
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }
}
