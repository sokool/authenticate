<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 24.11.14
 * Time: 15:26
 */

namespace MintSoft\Authentication\Listener;

use MintSoft\Authentication\Event\AuthenticationEvent;
use Nette\Diagnostics\Debugger;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Authentication\Result as AuthenticationResult;

class LogListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(AuthenticationEvent::EVENT_LOGIN, array($this, 'onLogin'));
        $this->listeners[] = $events->attach(AuthenticationEvent::EVENT_SUCCESS, array($this, 'onSuccess'));
        $this->listeners[] = $events->attach(AuthenticationEvent::EVENT_FAIL, array($this, 'onFail'));
        $this->listeners[] = $events->attach(AuthenticationEvent::EVENT_LOGOUT, array($this, 'onLogout'));
    }

    public function onSuccess(AuthenticationEvent $authEvent)
    {
        Debugger::dump(__METHOD__);
        Debugger::dump($authEvent->getIdentity());
        Debugger::dump($authEvent->getCredential());
        //Debugger::dump($authEvent->getResult());
    }

    public function onFail(AuthenticationEvent $authEvent)
    {
        Debugger::dump(__METHOD__);
        Debugger::dump($authEvent->getIdentity());
        Debugger::dump($authEvent->getCredential());
        //Debugger::dump($authEvent->getResult());
    }

    public function onLogout(AuthenticationEvent $authEvent)
    {
        //  Debugger::dump($a->getTarget()->getIdentity());
        Debugger::dump(__METHOD__);
        Debugger::dump($authEvent->getIdentity());
        Debugger::dump($authEvent->getCredential());
        //Debugger::dump($authEvent->getResult());
    }

    public function onLogin(AuthenticationEvent $authEvent)
    {
        Debugger::dump(__METHOD__);
        Debugger::dump($authEvent->getIdentity());
        Debugger::dump($authEvent->getCredential());

        $authEvent->setResult(new AuthenticationResult(AuthenticationResult::SUCCESS, $authEvent->getIdentity()));
        //Debugger::dump($authEvent->getResult());
    }
} 