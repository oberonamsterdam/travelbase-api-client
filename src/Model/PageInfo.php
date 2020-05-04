<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Model;

class PageInfo
{

    /**
     * @var bool
     */
    private $hasPreviousPage;

    /**
     * @var bool
     */
    private $hasNextPage;

    /**
     * @var string|null
     */
    private $startCursor;

    /**
     * @var string|null
     */
    private $endCursor;

    /**
     * @return bool
     */
    public function isHasPreviousPage(): bool
    {
        return $this->hasPreviousPage;
    }

    /**
     * @param bool $hasPreviousPage
     * @return self
     */
    public function setHasPreviousPage(bool $hasPreviousPage): self
    {
        $this->hasPreviousPage = $hasPreviousPage;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHasNextPage(): bool
    {
        return $this->hasNextPage;
    }

    /**
     * @param bool $hasNextPage
     * @return self
     */
    public function setHasNextPage(bool $hasNextPage): self
    {
        $this->hasNextPage = $hasNextPage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStartCursor(): ?string
    {
        return $this->startCursor;
    }

    /**
     * @param string|null $startCursor
     * @return self
     */
    public function setStartCursor(?string $startCursor): self
    {
        $this->startCursor = $startCursor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndCursor(): ?string
    {
        return $this->endCursor;
    }

    /**
     * @param string|null $endCursor
     * @return self
     */
    public function setEndCursor(?string $endCursor): self
    {
        $this->endCursor = $endCursor;

        return $this;
    }
}
