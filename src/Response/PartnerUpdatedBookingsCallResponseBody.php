<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\PartnerUpdatedBookingsResult;

class PartnerUpdatedBookingsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var PartnerUpdatedBookingsResult
     */
    private $data;

    /**
     * PartnerUpdatedBookingsCallResponseBody constructor.
     * @param PartnerUpdatedBookingsResult $data
     */
    public function __construct(PartnerUpdatedBookingsResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return PartnerUpdatedBookingsResult
     */
    public function getData(): PartnerUpdatedBookingsResult
    {
        return $this->data;
    }
}
