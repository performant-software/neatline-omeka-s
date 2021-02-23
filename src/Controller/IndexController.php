<?php

namespace Neatline\Controller;

use Neatline\Authentication\JwtUtils;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    protected $serviceLocator;

    protected function neatlineIndex($full = false)
    {
        $view = new ViewModel();
        if ($full) {
            $view->setTerminal(true);
        }
        $view->site_slug = $this->getEvent()->getRouteMatch()->getParam('site-slug');
        $asset_manifest = file_get_contents('modules/Neatline/asset/neatline/build/asset-manifest.json');
        $view->asset_manifest = json_decode($asset_manifest, true);

        // encode the current user's ID in a JWT to be returned with API requests
        $auth = $this->getServiceLocator()->get('Omeka\AuthenticationService');
        $entityManager = $this->getServiceLocator()->get('Omeka\EntityManager');

        if ($auth->hasIdentity()) {
            $userId = $auth->getIdentity()->getId();
            $repository = $entityManager->getRepository('Neatline\Entity\User');

            $user = $repository->find($userId);
            $view->jwt = JwtUtils::encode($this->getServiceLocator(), $user);
        }

        return $view;
    }

    public function indexAction()
    {
        return $this->neatlineIndex(false);
    }

    public function fullAction()
    {
        return $this->neatlineIndex(true);
    }

    public function setServiceLocator($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function browseAction()
    {
        $view = new ViewModel;
        return $view;
    }

    public function showAction()
    {
        $view = new ViewModel;
        return $view;
    }
}
