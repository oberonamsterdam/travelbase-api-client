<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Response;

use TOR\GraphQL\Result\CreateOrReplaceAllotmentsResult;

class CreateOrReplaceAllotmentsCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var CreateOrReplaceAllotmentsResult
     */
    public $data;

    /**
     * @return CreateOrReplaceAllotmentsResult
     */
    public function getData(): CreateOrReplaceAllotmentsResult
    {
        return $this->data;
    }

    /**
     * @param CreateOrReplaceAllotmentsResult $data
     * @return self
     */
    public function setData(CreateOrReplaceAllotmentsResult $data): self
    {
        $this->data = $data;

        return $this;
    }
}
