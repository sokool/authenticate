<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 13.10.14
 * Time: 21:02
 */
namespace MintSoft\Authentication\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AuthenticateController extends AbstractActionController
{
    public function loginAction()
    {
        $post = $this->params()->fromQuery();
        if ($post) {
            if ($this->auth()->login($post['username'], $post['password'])->isValid()) {
                return $this->getResponse()->setContent('Success');
                //return $this->redirect()->toRoute('one-page');
            } else {
                return $this->getResponse()->setContent('Unknown username or wrong password');
                //$this->flashMessenger()->addErrorMessage('Unknown username or wrong password');
            }
        }

        return $this->getResponse()->setContent('Fail');
        //return $this->redirect()->toRoute('authentication-page');
    }

    public function logoutAction()
    {
        $this->auth()->logout();

        return $this->getResponse()->setContent('Success');
        //return $this->redirect()->toRoute('one-page');
    }
}