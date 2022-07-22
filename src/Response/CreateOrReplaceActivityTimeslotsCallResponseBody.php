<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\CreateOrReplaceActivityTimeslotsResult;

class CreateOrReplaceActivityTimeslotsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CreateOrReplaceActivityTimeslotsResult
     */
    private $data;

    /**
     * CreateOrReplaceActivityTimeslotsCallResponseBody constructor.
     * @param CreateOrReplaceActivityTimeslotsResult $data
     */
    public function __construct(CreateOrReplaceActivityTimeslotsResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return CreateOrReplaceActivityTimeslotsResult
     */
    public function getData(): CreateOrReplaceActivityTimeslotsResult
    {
        return $this->data;
    }
}
