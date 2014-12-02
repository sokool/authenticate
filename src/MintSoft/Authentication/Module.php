<?php
namespace MintSoft\Authentication;

use Zend\ModuleManager\Feature\ControllerPluginProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface, ControllerPluginProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return include __DIR__ . '/../../../config/service.config.php';
    }

    public function getControllerPluginConfig()
    {
        return include __DIR__ . '/../../../config/plugin.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', DIRECTORY_SEPARATOR, __NAMESPACE__),
                ),
            ),
        );
    }
}
