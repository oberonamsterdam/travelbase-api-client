<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Model;

class Order
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $customerFirstName;

    /**
     * @var string|null
     */
    private $customerInfix;

    /**
     * @var string
     */
    private $customerLastName;

    /**
     * @var Address
     */
    private $customerAddress;

    /**
     * @var string|null
     */
    private $customerPhoneNumber;

    /**
     * @var string|null
     */
    private $customerEmail;

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
     * @return string
     */
    public function getCustomerFirstName(): string
    {
        return $this->customerFirstName;
    }

    /**
     * @param string $customerFirstName
     * @return self
     */
    public function setCustomerFirstName(string $customerFirstName): self
    {
        $this->customerFirstName = $customerFirstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerInfix(): ?string
    {
        return $this->customerInfix;
    }

    /**
     * @param string|null $customerInfix
     * @return self
     */
    public function setCustomerInfix(?string $customerInfix): self
    {
        $this->customerInfix = $customerInfix;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerLastName(): string
    {
        return $this->customerLastName;
    }

    /**
     * @param string $customerLastName
     * @return self
     */
    public function setCustomerLastName(string $customerLastName): self
    {
        $this->customerLastName = $customerLastName;

        return $this;
    }

    /**
     * @return Address
     */
    public function getCustomerAddress(): Address
    {
        return $this->customerAddress;
    }

    /**
     * @param Address $customerAddress
     * @return self
     */
    public function setCustomerAddress(Address $customerAddress): self
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerPhoneNumber(): ?string
    {
        return $this->customerPhoneNumber;
    }

    /**
     * @param string|null $customerPhoneNumber
     * @return self
     */
    public function setCustomerPhoneNumber(?string $customerPhoneNumber): self
    {
        $this->customerPhoneNumber = $customerPhoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }

    /**
     * @param string|null $customerEmail
     * @return self
     */
    public function setCustomerEmail(?string $customerEmail): self
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }
}
