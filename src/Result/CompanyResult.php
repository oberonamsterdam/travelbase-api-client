<?php

namespace Oberon\TravelbaseClient\Result;

use Oberon\TravelbaseClient\Model\Company;

class CompanyResult
{
    /**
     * @var Company
     */
    public $company;

    /**
     * CompanyResult constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }
}
