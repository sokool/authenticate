<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25.11.14
 * Time: 08:54
 */
namespace Authenticate\Mvc\Controller\Plugin;

use Authenticate\Authentication as AuthenticationService;
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
        $this->authenticationService
            ->getAdapter()
            ->setIdentity($username)
            ->setCredential($password);

        return $this->authenticationService->authenticate();
    }

    public function logout()
    {
        return $this->authenticationService->clearIdentity();
    }
} 