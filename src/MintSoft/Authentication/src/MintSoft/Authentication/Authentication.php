<?php
namespace Authenticate;

use Nette\Diagnostics\Debugger;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\AuthenticationService as AuthenticationService;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\Authentication\Exception;

class Authentication extends AuthenticationService implements EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    const
        EVENT_SUCCESS = 'on.success.login',
        EVENT_FAIL = 'on.fail.login',
        EVENT_LOGOUT = 'on.logout';

    protected $defaultListeners = [
        'Authenticate\Listener\LogListener'
    ];

    protected function attachDefaultListeners()
    {
        foreach ($this->defaultListeners as $listenerClass) {
            if (!class_exists($listenerClass)) {
                throw new \RuntimeException;
            }

            $this->getEventManager()->attach(new $listenerClass);
        }
    }

    public function authenticate(AdapterInterface $adapter = null)
    {

        $result = parent::authenticate($adapter);
        if ($result->isValid()) {
            $this->getEventManager()->trigger(self::EVENT_SUCCESS, $this);
        } else {
            $this->getEventManager()->trigger(self::EVENT_FAIL, $this);
        }

        return $result;
    }

    public function clearIdentity()
    {
        $this->getEventManager()->trigger(self::EVENT_LOGOUT, $this);

        return parent::clearIdentity();
    }
}