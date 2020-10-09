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
     * Order constructor.
     * @param string $id
     * @param string $customerFirstName
     * @param string $customerLastName
     * @param Address $customerAddress
     * @param string|null $customerPhoneNumber
     * @param string|null $customerEmail
     */
    public function __construct(
        string $id,
        string $customerFirstName,
        string $customerLastName,
        Address $customerAddress,
        ?string $customerPhoneNumber,
        ?string $customerEmail
    ) {
        $this->id = $id;
        $this->customerFirstName = $customerFirstName;
        $this->customerLastName = $customerLastName;
        $this->customerAddress = $customerAddress;
        $this->customerPhoneNumber = $customerPhoneNumber;
        $this->customerEmail = $customerEmail;
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
    public function getCustomerFirstName(): string
    {
        return $this->customerFirstName;
    }

    /**
     * @return string
     */
    public function getCustomerLastName(): string
    {
        return $this->customerLastName;
    }

    /**
     * @return Address
     */
    public function getCustomerAddress(): Address
    {
        return $this->customerAddress;
    }

    /**
     * @return string|null
     */
    public function getCustomerPhoneNumber(): ?string
    {
        return $this->customerPhoneNumber;
    }

    /**
     * @return string|null
     */
    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }
}
