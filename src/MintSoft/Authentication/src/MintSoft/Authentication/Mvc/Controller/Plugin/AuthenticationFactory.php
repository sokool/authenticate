<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 02.12.14
 * Time: 16:00
 */

namespace MintSoft\Authentication\Mvc\Controller\Plugin;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use MintSoft\Authentication\Mvc\Controller\Plugin\Authentication as AuthenticationPlugin;

class AuthenticationFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $authenticationService = $serviceLocator->getServiceLocator()->get('MintSoft\Authentication');

        return new AuthenticationPlugin($authenticationService);
    }
}