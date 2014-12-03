<?php

return [
    'factories' => [
        'MintSoft\Authentication'        => 'MintSoft\Authentication\AuthenticationFactory',
        'MintSoft\AuthenticationStorage' => 'MintSoft\Authentication\Factory\StorageFactory',
        //'MintSoft\AuthenticationAdapter' => null,
    ],
    'aliases'   => [
        'Zend\Authentication\AuthenticationService'    => 'MintSoft\Authentication',
        'Zend\Authentication\Storage\StorageInterface' => 'MintSoft\AuthenticationStorage',
        'Zend\Authentication\Adapter\AdapterInterface' => 'MintSoft\AuthenticationAdapter',
    ]
];