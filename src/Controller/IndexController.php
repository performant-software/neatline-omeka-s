<?php

namespace Neatline\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Firebase\JWT\JWT;

class IndexController extends AbstractActionController
{

    protected $serviceLocator;

    public function indexAction()
    {
        $view = new ViewModel();
        $asset_manifest = file_get_contents('modules/Neatline/asset/neatline/build/asset-manifest.json');
        $view->asset_manifest = json_decode($asset_manifest, true);

        // encode the current user's ID in a JWT to be returned with API requests
        $auth = $this->getServiceLocator()->get('Omeka\AuthenticationService');
        if ($auth->hasIdentity()) {
            $user_id = $auth->getIdentity()->getId();
            $token = array(
                // 'iss' => root url?,
                // 'aud' => view url?,
                // 'iat' => now,
                // 'nbf' => ?,
                // user ip?,
                'user_id' => $user_id
            );
            $globalSettings = $this->getServiceLocator()->get('Omeka\Settings');
            $key = $globalSettings->get('neatline_jwt_secret');
            if (!$key) {
                $key = getenv('NEATLINE_JWT_SECRET');
                if (!$key) $key = 'default_neatline_secret';
                $globalSettings->set('neatline_jwt_secret', $key);
            }
            $view->jwt = JWT::encode($token, $key);
        }

        return $view;
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
}
