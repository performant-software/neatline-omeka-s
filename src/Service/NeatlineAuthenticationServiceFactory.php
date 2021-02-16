<?php
namespace Neatline\Service;

use Omeka\Service\AuthenticationServiceFactory;
use Interop\Container\ContainerInterface;
use Laminas\Authentication\AuthenticationService;
use Omeka\Authentication\Storage\DoctrineWrapper;
use Laminas\Authentication\Storage\NonPersistent;
use Neatline\Authentication\Adapter\JwtAdapter;

class NeatlineAuthenticationServiceFactory extends AuthenticationServiceFactory
{
    /**
     * Create the authentication service.
     *
     * @return ApiManager
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $status = $serviceLocator->get('Neatline\NeatlineStatus');

        if ($status->isNeatlineApiRequest($serviceLocator)) {
            $entityManager = $serviceLocator->get('Omeka\EntityManager');
            $userRepository = $entityManager->getRepository('Omeka\Entity\User');
            $storage = new DoctrineWrapper(new NonPersistent, $userRepository);
            $adapter = new JwtAdapter($userRepository, $serviceLocator);
            $authService = new AuthenticationService($storage, $adapter);
            return $authService;
        } else {
            return parent::__invoke($serviceLocator, $requestedName, $options);
        }
    }
}
