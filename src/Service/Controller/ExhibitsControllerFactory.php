<?php
namespace Neatline\Service\Controller;

use Neatline\Controller\Admin\ExhibitsController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ExhibitsControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config = $serviceLocator->get('Config');
        $exhibitController = new ExhibitsController($config);
        return $exhibitController;
    }
}
