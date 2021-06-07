<?php
namespace Neatline\Controller;

use Omeka\Controller\LoginController as OmekaLoginController;
use Zend\Session\Container;

class LoginController extends OmekaLoginController
{
    public function logoutAction()
    {
        $identity = $this->auth->getIdentity()->getId();
        $this->auth->clearIdentity();

        $sessionManager = Container::getDefaultManager();

        $eventManager = $this->getEventManager();
        $eventManager->trigger('user.logout', $identity);

        $sessionManager->destroy();

        $this->messenger()->addSuccess('Successfully logged out'); // @translate
        return $this->redirect()->toRoute('login');
    }
}