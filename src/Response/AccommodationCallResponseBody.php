<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Response;

use Oberon\TorClient\Result\AccommodationResult;

class AccommodationCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var AccommodationResult
     */
    public $data;

    /**
     * @return AccommodationResult
     */
    public function getData(): AccommodationResult
    {
        return $this->data;
    }

    /**
     * @param AccommodationResult $data
     * @return self
     */
    public function setData(AccommodationResult $data): self
    {
        $this->data = $data;

        return $this;
    }
}
