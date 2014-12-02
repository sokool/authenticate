<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 13.10.14
 * Time: 16:11
 */
namespace Authenticate;

use Nette\Diagnostics\Debugger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return AuthenticationService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return (new Authentication)
            ->setAdapter($serviceLocator->get('MintSoft\AuthenticationAdapter'))
            ->setStorage($serviceLocator->get('MintSoft\AuthenticationStorage'));
    }
}