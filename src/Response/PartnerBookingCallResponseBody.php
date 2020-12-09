<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Response;

use Oberon\TravelbaseManagementApi\Result\PartnerBookingResult;

class PartnerBookingCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var PartnerBookingResult
     */
    private $data;

    public function __construct(PartnerBookingResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return PartnerBookingResult
     */
    public function getData(): PartnerBookingResult
    {
        return $this->data;
    }
}
