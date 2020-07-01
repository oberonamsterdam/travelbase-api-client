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
     * @var DateTimeInterface
     */
    private $date;

    /**
     * @var int
     */
    private $amount;

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     * @return self
     */
    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self
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
