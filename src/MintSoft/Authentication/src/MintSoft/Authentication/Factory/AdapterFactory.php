<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 13.10.14
 * Time: 18:05
 */

namespace MintSoft\Authentication\Factory;

use MintSoft\Authentication\Adapter\CallbackAdapter;
use Nette\Diagnostics\Debugger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdapterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configuration = $serviceLocator->get('Configuration');
        return new CallbackAdapter($configuration['mint-soft-authentication']['on-login']);
    }
}