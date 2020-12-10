<?php
/**
 * Date: 04-05-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Model;

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
     * PageInfo constructor.
     * @param bool $hasPreviousPage
     * @param bool $hasNextPage
     * @param string|null $startCursor
     * @param string|null $endCursor
     */
    public function __construct(
        bool $hasPreviousPage,
        bool $hasNextPage,
        ?string $startCursor,
        ?string $endCursor
    ) {
        $this->hasPreviousPage = $hasPreviousPage;
        $this->hasNextPage = $hasNextPage;
        $this->startCursor = $startCursor;
        $this->endCursor = $endCursor;
    }

    /**
     * @return bool
     */
    public function isHasPreviousPage(): bool
    {
        return $this->hasPreviousPage;
    }

    /**
     * @return bool
     */
    public function isHasNextPage(): bool
    {
        return $this->hasNextPage;
    }

    /**
     * @return string|null
     */
    public function getStartCursor(): ?string
    {
        return $this->startCursor;
    }

    /**
     * @return string|null
     */
    public function getEndCursor(): ?string
    {
        return $this->endCursor;
    }
}
