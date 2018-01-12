<?php
namespace Neatline\Service\Form;

use Neatline\Form\ExhibitForm;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ExhibitFormFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        $form = new ExhibitForm(null, $options);
        return $form;
    }
}
