<?php

return [
    'mintsoft'    => [
        'authentication' => [
            'test' => 'asd',
        ]
    ],
    'controllers' => array(
        'invokables' => array(
            'MintSoft\Authenticate' => 'MintSoft\Authentication\Controller\AuthenticateController',
        ),
    ),
    'router'      => array(
        'routes' => array(
            'login'  => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/auth',
                    'defaults' => array(
                        'controller' => 'MintSoft\Authenticate',
                        'action'     => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        'controller' => 'MintSoft\Authenticate',
                        'action'     => 'logout',
                    ),
                ),
            ),
        ),
    ),
];

