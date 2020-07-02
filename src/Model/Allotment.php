<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */
namespace Oberon\TorClient\Model;

use \DateTimeInterface;

class Allotment implements InputInterface
{
    /**
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * @var int|null
     */
    private $amount;

    /**
     * Allotment constructor.
     * @param DateTimeInterface|null $date
     * @param int|null $amount
     */
    public function __construct(
        ?DateTimeInterface $date = null,
        ?int $amount = null
    ) {
        $this->date = $date;
        $this->amount = $amount;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     * @return self
     */
    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'date' => $this->getDate()->format('Y-m-d'),
            'amount' => $this->getAmount(),
        ];
    }
}
