<?php
namespace Neatline\Service\Controller;

use Neatline\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config = $serviceLocator->get('Config');
        $indexController = new IndexController($config);
        $indexController->setServiceLocator($serviceLocator);
        return $indexController;
    }
}
