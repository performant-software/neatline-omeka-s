<?php
namespace Neatline\Form;

use Zend\Form\Form;

class ExhibitForm extends Form
{
    public function init()
    {
        $this->setAttribute('action', 'neatline/exhibits/create');
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title', // @translate
                'info' => 'A top-level heading for the exhibit, displayed in the page header in the public view for the exhibit.', // @translate
            ],
            'attributes' => [
                'id' => 'title',
                'required' => 'true',
            ],
        ]);
        $this->add([
            'name' => 'slug',
            'type' => 'text',
            'options' => [
                'label' => 'URL Slug', // @translate
                'info' => 'A unique string used to form the public-facing URL for the exhibit. Can contain letters, numbers, and hyphens.', // @translate
            ],
        ]);

        $inputFilter = $this->getInputFilter();
        $inputFilter->add([
            'name' => 'title',
            'required' => true,
        ]);
    }
}
