<?php

namespace Neatline\Controller\Admin;

use Neatline\Form\ExhibitForm;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class ExhibitsController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $site = $this->currentSite();
        $view->site = $site;

        return $view;
    }

    public function addAction()
    {
        $view = new ViewModel();
        $form = $this->getForm(ExhibitForm::class);
        $view->form = $form;
        return $view;
    }

    public function createAction()
    {
        $view = new ViewModel();
        $site = $this->currentSite();
        $view->site = $site;

        return $view;        
    }
}
