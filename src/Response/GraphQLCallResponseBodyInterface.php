<?php
/**
 * Date: 30-04-2020
 * @author Raymond Kiekens
 * @copyright (c) Oberon 2020
 */

namespace TOR\GraphQL\Response;

use TOR\GraphQL\Model\PartnerCollection;

interface GraphQLCallResponseBodyInterface
{
    public function getData();
}
