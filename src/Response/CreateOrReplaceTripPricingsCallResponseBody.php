<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Response;

use Oberon\TorClient\Result\CreateOrReplaceTripPricingsResult;

class CreateOrReplaceTripPricingsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CreateOrReplaceTripPricingsResult
     */
    public $data;

    /**
     * @return CreateOrReplaceTripPricingsResult
     */
    public function getData(): CreateOrReplaceTripPricingsResult
    {
        return $this->data;
    }

    /**
     * @param CreateOrReplaceTripPricingsResult $data
     * @return self
     */
    public function setData(CreateOrReplaceTripPricingsResult $data): self
    {
        $this->data = $data;

        return $this;
    }
}
