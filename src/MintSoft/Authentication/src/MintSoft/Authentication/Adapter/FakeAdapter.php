<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 03.12.14
 * Time: 13:37
 */

namespace MintSoft\Authentication\Adapter;

use Zend\Authentication\Adapter\AbstractAdapter as AuthenticationAdapter;
use Zend\Authentication\Result as AuthenticationResult;

class FakeAdapter extends AuthenticationAdapter
{
    public function authenticate()
    {
        return new AuthenticationResult(AuthenticationResult::FAILURE, '', ['fakeAuthorization' => __METHOD__]);
    }
}