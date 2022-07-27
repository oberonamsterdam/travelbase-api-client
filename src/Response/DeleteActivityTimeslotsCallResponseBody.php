<?php
/**
 * Date: 22-07-2022
 * @author Richard de Boer
 * @copyright (c) Oberon 2022
 */

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\DeleteActivityTimeslotsResult;

class DeleteActivityTimeslotsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var DeleteActivityTimeslotsResult
     */
    private $data;

    public function __construct(DeleteActivityTimeslotsResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return DeleteActivityTimeslotsResult
     */
    public function getData(): DeleteActivityTimeslotsResult
    {
        return $this->data;
    }
}
