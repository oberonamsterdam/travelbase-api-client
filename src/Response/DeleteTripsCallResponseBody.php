<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Response;

use TOR\GraphQL\Result\DeleteTripsResult;

class DeleteTripsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var DeleteTripsResult
     */
    public $data;

    /**
     * @return DeleteTripsResult
     */
    public function getData(): DeleteTripsResult
    {
        return $this->data;
    }

    /**
     * @param DeleteTripsResult $data
     * @return self
     */
    public function setData(DeleteTripsResult $data): self
    {
        $this->data = $data;

        return $this;
    }
}
