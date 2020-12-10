<?php
/**
 * Date: 08-10-2020
 * @author Richard de Boer
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\BookingResult;

class BookingCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var BookingResult
     */
    private $data;

    public function __construct(BookingResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return BookingResult
     */
    public function getData(): BookingResult
    {
        return $this->data;
    }
}
