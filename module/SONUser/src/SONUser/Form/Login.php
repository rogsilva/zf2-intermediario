<?php

namespace SONUser\Form;

use Zend\Form\Form;

class Login extends Form
{
    public function __construct($name = null, $options = array()) {
        parent::__construct('Login', $options);
        
        $this->setAttribute('method', 'post');
        
        $email = new \Zend\Form\Element\Text('email');
        $email->setLabel('Email: ')
                ->setAttribute('placeholder', 'Digite seu email');
        $this->add($email);
        
        $password = new \Zend\Form\Element\Password('password');
        $password->setLabel('Senha: ')
                ->setAttribute('placeholder', 'Digite sua senha');
        $this->add($password);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Entrar',
                'class' => 'btn-success'
            )
        ));
        
        
    }
}
