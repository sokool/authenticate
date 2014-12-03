<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 13.10.14
 * Time: 18:06
 */
namespace MintSoft\Authentication\Adapter;

use Zend\Authentication\Adapter\AbstractAdapter as AuthenticationAdapter;
use Zend\Authentication\Result;

class CallbackAdapter extends AuthenticationAdapter
{
    protected $callback;

    public function __construct(\Closure $callback)
    {
        $this->callback = $callback;
    }

    public function authenticate()
    {
echo 'jedziemy!';
        exit;
        $result = [
            'code'     => Result::SUCCESS,
            'identity' => $this->getIdentity(),
            'messages' => ['no fucking way'],
        ];
        echo $this->getIdentity() . '/' . $this->getCredential();

        return new Result($result['code'], $result['identity'], $result['messages']);
    }
}