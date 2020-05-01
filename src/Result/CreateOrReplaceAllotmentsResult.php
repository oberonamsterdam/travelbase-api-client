<?php
/**
 * Date: 29-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Result;

use TOR\GraphQL\Model\AllotmentCollection;

class CreateOrReplaceAllotmentsResult
{
    /**
     * @var AllotmentCollection
     */
    public $createOrReplaceAllotments;

    /**
     * @return AllotmentCollection
     */
    public function getCreateOrReplaceAllotments(): AllotmentCollection
    {
        return $this->createOrReplaceAllotments;
    }

    /**
     * @param AllotmentCollection $createOrReplaceAllotments
     * @return self
     */
    public function setCreateOrReplaceAllotments(
        AllotmentCollection $createOrReplaceAllotments
    ): self {
        $this->createOrReplaceAllotments = $createOrReplaceAllotments;

        return $this;
    }
}
