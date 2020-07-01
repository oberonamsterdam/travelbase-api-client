<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace Oberon\TorClient\Response;

use Oberon\TorClient\Model\PartnerCollection;

interface GraphQLCallResponseBodyInterface
{
    public function getData();
}
