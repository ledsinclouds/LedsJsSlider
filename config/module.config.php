<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'LedsJsSlider\Controller\Index' => 'LedsJsSlider\Controller\IndexController',
        ),
    ),
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'LedsJsSlider' => __DIR__ . '/../public',
            ),
        ),
    ),    
     'router' => array(
        'routes' => array(
            'slider' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/slider[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'LedsJsSlider\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
 	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view'
		),
		'template_map' => array(

		),
		'strategies' => array(
			'ViewJsonStrategy',
		),
	),
    'doctrine' => array(
        'driver' => array(
            'Slider_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/LedsJsSlider/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'LedsJsSlider\Entity' => 'Slider_driver',
                ),
            ),
		),
	),
);
