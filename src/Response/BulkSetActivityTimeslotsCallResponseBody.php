<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\BulkSetActivityTimeslotsResult;

class BulkSetActivityTimeslotsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var BulkSetActivityTimeslotsResult
     */
    private $data;

    /**
     * BulkSetActivityTimeslotsCallResponseBody constructor.
     * @param BulkSetActivityTimeslotsResult $data
     */
    public function __construct(BulkSetActivityTimeslotsResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return BulkSetActivityTimeslotsResult
     */
    public function getData(): BulkSetActivityTimeslotsResult
    {
        return $this->data;
    }
}
