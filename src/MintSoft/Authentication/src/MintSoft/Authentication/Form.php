<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 30.12.14
 * Time: 09:27
 */

namespace MintSoft\Authentication;

use Zend\Form\Form as ZendForm,
    Zend\InputFilter\InputFilterProviderInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{

    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);

        $this
            ->setAttribute('method', 'post')
            ->add([
                'type' => 'Text',
                'name' => 'username',
            ])
            ->add([
                'type' => 'Password',
                'name' => 'password',
            ])
            ->add([
                'type' => 'Checkbox',
                'name' => 'remember',
            ])
            ->add([
                'type' => 'Submit',
                'name' => 'login',
            ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'username' => [
                'validators' => [
                    ['name' => 'MintSoft\Authentication']
                ]
            ]
        ];
    }
}