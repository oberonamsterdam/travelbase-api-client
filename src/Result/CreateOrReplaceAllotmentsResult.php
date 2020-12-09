<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TravelbaseManagementApi\Result;

use Oberon\TravelbaseManagementApi\Model\AllotmentCollection;

class CreateOrReplaceAllotmentsResult
{
    /**
     * @var AllotmentCollection
     */
    public $createOrReplaceAllotments;


    /**
     * CreateOrReplaceAllotmentsResult constructor.
     * @param AllotmentCollection $createOrReplaceAllotments
     */
    public function __construct(AllotmentCollection $createOrReplaceAllotments)
    {
        $this->createOrReplaceAllotments = $createOrReplaceAllotments;
    }

    /**
     * @return AllotmentCollection
     */
    public function getCreateOrReplaceAllotments(): AllotmentCollection
    {
        return $this->createOrReplaceAllotments;
    }
}
