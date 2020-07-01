<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Response;

use Oberon\TorClient\Result\PartnersResult;

class PartnersCallResponseBody implements GraphQLCallResponseBodyInterface
{
    /**
     * @var PartnersResult
     */
    public $data;

    /**
     * @return PartnersResult
     */
    public function getData(): PartnersResult
    {
        return $this->data;
    }

    /**
     * @param PartnersResult $data
     * @return self
     */
    public function setData(PartnersResult $data): self
    {
        $this->data = $data;

        return $this;
    }
}
