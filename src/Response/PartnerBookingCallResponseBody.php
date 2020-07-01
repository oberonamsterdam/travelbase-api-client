<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Response;

use Oberon\TorClient\Result\PartnerBookingResult;

class PartnerBookingCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var PartnerBookingResult
     */
    public $data;

    /**
     * @return PartnerBookingResult
     */
    public function getData(): PartnerBookingResult
    {
        return $this->data;
    }

    /**
     * @param PartnerBookingResult $data
     * @return self
     */
    public function setData(PartnerBookingResult $data): self
    {
        $this->data = $data;

        return $this;
    }
}
