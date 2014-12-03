<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25.11.14
 * Time: 08:54
 */
namespace MintSoft\Authentication\Mvc\Controller\Plugin;

use MintSoft\Authentication\Authentication as AuthenticationService;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Authentication extends AbstractPlugin
{
    protected $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function login($username, $password)
    {
        $adapter = $this
            ->authenticationService
            ->getAdapter()
            ->setCredential($password)
            ->setIdentity($username);

        return $this->authenticationService->authenticate($adapter);
    }

    public function logout()
    {
        return $this->authenticationService->clearIdentity();
    }
} 