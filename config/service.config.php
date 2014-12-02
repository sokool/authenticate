<?php

return [
    'factories' => [
        'MintSoft\Authentication'        => 'Authenticate\AuthenticationFactory',
        'MintSoft\AuthenticationStorage' => 'Authenticate\Factory\StorageFactory',
        'MintSoft\AuthenticationAdapter' => 'Authenticate\Factory\AdapterFactory'
    ],
    'aliases'   => [
        'Zend\Authentication\AuthenticationService' => 'MintSoft\Authentication',
    ]
];