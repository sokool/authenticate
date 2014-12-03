<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 13.10.14
 * Time: 16:16
 */

namespace MintSoft\Authentication\Factory;

use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StorageFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new SessionStorage('mintSoftAuthentication');
    }
}