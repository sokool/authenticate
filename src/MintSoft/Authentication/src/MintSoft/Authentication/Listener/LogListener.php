<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 24.11.14
 * Time: 15:26
 */
namespace Authenticate\Listener;

use Authenticate\Authentication;
use Nette\Diagnostics\Debugger;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;

class LogListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(Authentication::EVENT_SUCCESS, array($this, 'onSuccess'));
        $this->listeners[] = $events->attach(Authentication::EVENT_FAIL, array($this, 'onFail'));
        $this->listeners[] = $events->attach(Authentication::EVENT_LOGOUT, array($this, 'onLogout'));
    }

    public function onSuccess($a)
    {
        Debugger::dump(__METHOD__);
    }

    public function onFail($a)
    {
        Debugger::dump(__METHOD__);
    }

    public function onLogout($a)
    {
      //  Debugger::dump($a->getTarget()->getIdentity());
        Debugger::dump(__METHOD__);
    }
} 