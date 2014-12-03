<?php
namespace MintSoft\Authentication;

use MintSoft\Authentication\Adapter\FakeAdapter;
use MintSoft\Authentication\Event\AuthenticationEvent;
use Nette\Diagnostics\Debugger;
use Zend\Authentication\Adapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\AuthenticationService as AuthenticationService;
use Zend\Authentication\Storage;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\Authentication\Exception;

class Authentication extends AuthenticationService implements EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    protected $defaultListeners = [
        'MintSoft\Authentication\Listener\LogListener'
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
        $adapter      = is_null($adapter) ? $this->getAdapter() : $adapter;
        $eventManager = $this->getEventManager();
        $event        = (new AuthenticationEvent)
            ->setIdentity($adapter->getIdentity())
            ->setCredential($adapter->getCredential());

        $eventManager->trigger(AuthenticationEvent::EVENT_LOGIN, $event);
        $authenticationResult = $event->getResult();
        if (!$authenticationResult) {
            $authenticationResult = $adapter->authenticate();
        }

        if ($this->hasIdentity()) {
            $this->clearIdentity();
        }

        if ($authenticationResult->isValid()) {
            $eventManager->trigger(AuthenticationEvent::EVENT_SUCCESS, $event);
            $this->getStorage()->write($authenticationResult->getIdentity());
        } else {
            $eventManager->trigger(AuthenticationEvent::EVENT_FAIL, $event);
        }

        return $authenticationResult;
    }

    public function clearIdentity()
    {
        if ($this->hasIdentity()) {
            $event = new AuthenticationEvent();
            $event->setIdentity($this->getIdentity());
            $this->getEventManager()->trigger(AuthenticationEvent::EVENT_LOGOUT, $event);
        }

        return parent::clearIdentity();
    }

    /**
     * @return Adapter\ValidatableAdapterInterface
     * @throws \Exception
     */
    public function getAdapter()
    {
        $adapter = parent::getAdapter();
        if (!$adapter) {
            $this->setAdapter(new FakeAdapter);
        }

        return $this->adapter;
    }

    public function setAdapter(Adapter\AdapterInterface $adapter)
    {
        if (!$adapter instanceof Adapter\ValidatableAdapterInterface) {
            throw new \Exception('An authentication adapter must be instance of ValidatableAdapterInterface prior to calling authenticate()');
        }

        return parent::setAdapter($adapter);
    }
}