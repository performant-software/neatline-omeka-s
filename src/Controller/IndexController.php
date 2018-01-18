<?php

namespace Neatline\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $asset_manifest = file_get_contents('modules/Neatline/asset/neatline/build/asset-manifest.json');
        $view->asset_manifest = json_decode($asset_manifest, true);
        return $view;
    }
}
