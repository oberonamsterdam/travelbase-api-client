<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Response;

use TOR\GraphQL\Result\RentalUnitResult;

class RentalUnitCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var RentalUnitResult
     */
    public $data;

    /**
     * @return RentalUnitResult
     */
    public function getData(): RentalUnitResult
    {
        return $this->data;
    }

    /**
     * @param RentalUnitResult $data
     * @return self
     */
    public function setData(RentalUnitResult $data): self
    {
        $this->data = $data;

        return $this;
    }
}
