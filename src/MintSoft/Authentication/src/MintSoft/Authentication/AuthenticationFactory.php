<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 13.10.14
 * Time: 16:11
 */
namespace MintSoft\Authentication;

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
        $adapter = $serviceLocator->has('MintSoft\AuthenticationAdapter') ? $serviceLocator->get('MintSoft\AuthenticationAdapter') : null;
        $storage = $serviceLocator->has('MintSoft\AuthenticationStorage') ? $serviceLocator->get('MintSoft\AuthenticationStorage') : null;

        return new Authentication($storage, $adapter);
    }
}