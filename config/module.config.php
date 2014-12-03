<?php

return [
    'mint-soft-authentication' => [
        'on-login' => function() {
            echo ' taaakk';
        }
    ],
    'controllers' => array(
        'invokables' => array(
            'MintSoft\Authenticate' => 'MintSoft\Authentication\Controller\AuthenticateController',
        ),
    ),
    'router'      => array(
        'routes' => array(
            'login'   => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/auth',
                    'defaults' => array(
                        'controller' => 'Authenticate\Authenticate',
                        'action'     => 'login',
                    ),
                ),
            ),
            'logout'   => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        'controller' => 'Authenticate\Authenticate',
                        'action'     => 'logout',
                    ),
                ),
            ),

            'success' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/success',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SanAuth\Controller',
                        'controller'    => 'Success',
                        'action'        => 'index',
                    ),
                ),
            ),

        ),
    ),
];

