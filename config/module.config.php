<?php

return [
    'controllers' => [
        'factories' => [
            'Neatline\Controller\Admin\Exhibits' => 'Neatline\Service\Controller\ExhibitsControllerFactory',
            'Neatline\Controller\Index' => 'Neatline\Service\Controller\IndexControllerFactory',
        ],
    ],
    'api_adapters' => [
        'invokables' => [
            'neatline_exhibits' => 'Neatline\Api\Adapter\ExhibitAdapter',
        ],
    ],
    'entity_manager' => [
        'mapping_classes_paths' => [
            OMEKA_PATH . '/modules/Neatline/src/Entity',
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH . '/modules/Neatline/view',
        ],
    ],
    'form_elements' => [
        'factories' => [
            'Neatline\Form\ExhibitForm' => 'Neatline\Service\Form\ExhibitFormFactory',
        ],
    ],
    'navigation' => [
        'site' => [
            [
                'label' => 'Neatline', // @translate
                'route' => 'admin/site/slug/neatline/default',
                'action' => 'index',
                'useRouteMatch' => true,
                'pages' => [
                    [
                        'route' => 'admin/site/slug/neatline/default',
                        'visible' => false,
                    ],
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'neatline' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/neatline',
                    'defaults' => [
                        '__NAMESPACE__' => 'Neatline\Controller',
                        'controller' => 'index',
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
            ],
            'admin' => [
                'child_routes' => [
                    'site' => [
                        'child_routes' => [
                            'slug' => [
                                'child_routes' => [
                                    'neatline' => [
                                        'type' => 'Literal',
                                        'options' => [
                                            'route' => '/neatline',
                                            'defaults' => [
                                                '__NAMESPACE__' => 'Neatline\Controller\Admin',
                                                'controller' => 'exhibits',
                                                'action' => 'index',
                                            ],
                                        ],
                                        'may_terminate' => true,
                                        'child_routes' => [
                                            'default' => [
                                                'type' => 'Segment',
                                                'options' => [
                                                    'route' => '/:action',
                                                    'constraints' => [
                                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                    ],
                                                ],
                                            ],
                                            'exhibits' => [
                                                'type' => 'Literal',
                                                'options' => [
                                                    'route' => '/neatline',
                                                    'defaults' => [
                                                        '__NAMESPACE__' => 'Neatline\Controller\Admin',
                                                        'controller' => 'exhibits',
                                                        'action' => 'index',
                                                    ],
                                                ],
                                                'may_terminate' => true,
                                                'child_routes' => [
                                                    'default' => [
                                                        'type' => 'Segment',
                                                        'options' => [
                                                            'route' => '/:action',
                                                            'constraints' => [
                                                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ]
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
