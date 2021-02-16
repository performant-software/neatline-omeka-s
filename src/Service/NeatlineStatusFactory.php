<?php
namespace Neatline\Service;

use Neatline\Mvc\NeatlineStatus;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

/**
 * Status object factory.
 */
class NeatlineStatusFactory implements FactoryInterface
{
    /**
     * Create the status service.
     *
     * @return NeatlineStatus
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        return new NeatlineStatus($serviceLocator);
    }
}
