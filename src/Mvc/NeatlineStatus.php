<?php
namespace Neatline\Mvc;

use Zend\ServiceManager\ServiceLocatorInterface;

class NeatlineStatus
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function isNeatlineApiRequest()
    {
        $router = $this->serviceLocator->get('Router');
        $request = $this->serviceLocator->get('Request');
        $routeMatch = $router->match($request);

        if (null === $routeMatch) {
            return false;
        }
        return in_array($routeMatch->getParam('resource'), ['neatline_exhibits', 'neatline_records']);
    }
}
