<?php

return [
    'mint-soft-authentication' => [
        'on-login' => function (\Zend\Authentication\Adapter\ValidatableAdapterInterface $adapter) {
            ///\Nette\Diagnostics\Debugger::dump($adapter->getIdentity());

            return true;

        }
    ],
    'controllers'              => array(
        'invokables' => array(
            'MintSoft\Authenticate' => 'MintSoft\Authentication\Controller\AuthenticateController',
        ),
    ),
    'router'                   => array(
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

