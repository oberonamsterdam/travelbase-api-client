<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\ActivityResult;

class ActivityCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var ActivityResult
     */
    private $data;

    /**
     * ActivityCallResponseBody constructor.
     * @param ActivityResult $data
     */
    public function __construct(ActivityResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return ActivityResult
     */
    public function getData(): ActivityResult
    {
        return $this->data;
    }
}
