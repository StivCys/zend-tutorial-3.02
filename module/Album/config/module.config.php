<?php
namespace Album;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Router\Http\Segment;
return [
//    'controllers' => [
//        'factories' => [
//            Controller\AlbumController::class => InvokableFactory::class,
//        ],
//    ],
        // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'album' => [
//                'type'    => Segment::class,
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // Segment route for viewing one add ALBUM
                    'add' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'action' => 'add'
                            ]
                        ]
                    ],
                    // Segment route for viewing one add ALBUM
                    'edit' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/edit',
                            'defaults' => [
                                'action' => 'edit'
                            ]
                        ]
                    ]
                ],
            ],
            
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];