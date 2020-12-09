<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Response;

use Oberon\TravelbaseManagementApi\Result\PartnersResult;

class PartnersCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var PartnersResult
     */
    private $data;

    public function __construct(PartnersResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return PartnersResult
     */
    public function getData(): PartnersResult
    {
        return $this->data;
    }
}
