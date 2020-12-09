<?php
/**
 * Date: 09-12-2020
 * @author Richard de Boer
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Model;

use DateTimeInterface;

class Customer
{
    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var DateTimeInterface|null
     */
    private $birthdate;

    /**
     * Customer constructor.
     * @param string $locale
     * @param string|null $firstName
     * @param string|null $lastName
     * @param Address $address
     * @param string|null $phoneNumber
     * @param string|null $email
     * @param DateTimeInterface|null $birthdate
     */
    public function __construct(
        string $locale,
        ?string $firstName,
        ?string $lastName,
        Address $address,
        ?string $phoneNumber,
        ?string $email,
        ?DateTimeInterface $birthdate
    ) {
        $this->locale = $locale;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getBirthdate(): ?DateTimeInterface
    {
        return $this->birthdate;
    }
}
