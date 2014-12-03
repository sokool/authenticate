<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 03.12.14
 * Time: 11:21
 */
namespace MintSoft\Authentication\Event;

use Zend\EventManager\Event;
use Zend\Authentication\Result as AuthenticationResult;

class AuthenticationEvent extends Event
{
    const
        EVENT_LOGIN = 'on.login',
        EVENT_SUCCESS = 'on.success.login',
        EVENT_FAIL = 'on.fail.login',
        EVENT_LOGOUT = 'on.logout';

    protected $identity;
    protected $credential;

    /**
     * @var AuthenticationResult|null
     */
    protected $result = null;

    /**
     * @return mixed
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @param mixed $credential
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param mixed $identity
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * @return AuthenticationResult|null
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param AuthenticationResult $result
     *
     * @return $this
     */
    public function setResult(AuthenticationResult $result)
    {
        $this->result = $result;

        return $this;
    }
}