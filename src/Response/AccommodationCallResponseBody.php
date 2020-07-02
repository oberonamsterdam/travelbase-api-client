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
    private $data;

    public function __construct(AccommodationResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return AccommodationResult
     */
    public function getData(): AccommodationResult
    {
        return $this->data;
    }
}
