<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Model;

use App\Entity\Booking;

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
     * @var Booking[]
     */
    private $recentlyUpdatedBookings = [];

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
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return self
     */
    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return Accommodation[]
     */
    public function getAccommodations(): array
    {
        return $this->accommodations;
    }

    /**
     * @param Accommodation[] $accommodations
     * @return self
     */
    public function setAccommodations(array $accommodations): self
    {
        $this->accommodations = $accommodations;

        return $this;
    }

    /**
     * @param Accommodation $accommodation
     * @return $this
     */
    public function addAccommodation(Accommodation $accommodation): self
    {
        $this->accommodations[] = $accommodation;
        
        return $this;
    }

    /**
     * @return Booking[]
     */
    public function getRecentlyUpdatedBookings(): array
    {
        return $this->recentlyUpdatedBookings;
    }

    /**
     * @param Booking[] $recentlyUpdatedBookings
     * @return self
     */
    public function setRecentlyUpdatedBookings(array $recentlyUpdatedBookings): self 
    {
        $this->recentlyUpdatedBookings = $recentlyUpdatedBookings;

        return $this;
    }


    /**
     * @param Booking $booking
     * @return $this
     */
    public function addRecentlyUpdatedBooking(Booking $booking): self
    {
        $this->addRecentlyUpdatedBooking()[] = $booking;

        return $this;
    }
}
