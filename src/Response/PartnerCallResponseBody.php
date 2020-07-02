<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Response;

use Oberon\TorClient\Result\PartnerResult;

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
