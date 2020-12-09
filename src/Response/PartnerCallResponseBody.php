<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Response;

use Oberon\TravelbaseManagementApi\Result\PartnerResult;

class PartnerCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var PartnerResult
     */
    private $data;

    public function __construct(PartnerResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return PartnerResult
     */
    public function getData(): PartnerResult
    {
        return $this->data;
    }
}
