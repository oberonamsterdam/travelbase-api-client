<?php

namespace Oberon\TravelbaseClient\Response;

use Oberon\TravelbaseClient\Result\CompanyResult;

class CompanyCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CompanyResult
     */
    private $data;

    /**
     * CompanyCallResponseBody constructor.
     * @param CompanyResult $data
     */
    public function __construct(CompanyResult $data)
    {
        $this->data = $data;
    }

    /**
     * @return CompanyResult
     */
    public function getData(): CompanyResult
    {
        return $this->data;
    }
}
