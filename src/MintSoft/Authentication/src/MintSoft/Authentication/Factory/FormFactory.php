<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 30.12.14
 * Time: 09:23
 */

namespace MintSoft\Authentication\Factory;

use MintSoft\Authentication\Form as AuthenticationForm,
    Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Nette\Diagnostics\Debugger;

class FormFactory implements FactoryInterface
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
        $authService = $serviceLocator->get('MintSoft\Authentication');
        $authConfig  = $serviceLocator->get('Config')['mintsoft']['authentication'];
        $authForm    = new AuthenticationForm('authentication', $authConfig);

        return $authForm;
    }
}