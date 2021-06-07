<?php
namespace Neatline\Api\Representation;

use Neatline\Authentication\JwtUtils;
use Omeka\Api\Representation\UserRepresentation as OmekaUserRepresentation;

class UserRepresentation extends OmekaUserRepresentation
{
    public function getJsonLd()
    {
        return array_merge(parent::getJsonLd(), [
          'o:token' => JwtUtils::encode($this->getServiceLocator(), $this->resource)
        ]);
    }
}
