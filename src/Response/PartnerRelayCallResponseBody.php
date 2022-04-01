<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\PartnerRelayResult;

class PartnerRelayCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var PartnerRelayResult
     */
    private $data;

    public function __construct(PartnerRelayResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return PartnerRelayResult
     */
    public function getData(): PartnerRelayResult
    {
        return $this->data;
    }
}
