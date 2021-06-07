<?php
namespace Neatline\Api\Adapter;

use Firebase\JWT\JWT;
use Omeka\Api\Adapter\AbstractEntityAdapter;
use Omeka\Api\Adapter\UserAdapter;
use Omeka\Api\Exception\NotFoundException;
use Omeka\Api\Request;
use Omeka\Api\Response;
use Omeka\Api\Resource;
use Omeka\Entity\EntityInterface;
use Omeka\Stdlib\ErrorStore;

class LoginAdapter extends UserAdapter
{
    public function getEntityClass()
    {
        return \Neatline\Entity\User::class;
    }

    public function getRepresentationClass()
    {
        return \Neatline\Api\Representation\UserRepresentation::class;
    }

    public function create(Request $request)
    {
        $query = $request->getContent();
        $criteria = ['email' => $query['email']];
        $user = $this->findEntity($criteria, $request);

        if ($user && $user->isActive() && $user->verifyPassword($query['password']))
        {
            $user->createToken();
            $this->getEntityManager()->persist($user);

          if ($request->getOption('flushEntityManager', true)) {
              $this->getEntityManager()->flush();
              $this->getEntityManager()->refresh($user);
          }
        }
        else
        {
            throw new NotFoundException(sprintf(
                $this->getTranslator()->translate('Invalid login with criteria %1$s'),
                json_encode($criteria)
            ));
        }

        return new Response($user);
    }
}
