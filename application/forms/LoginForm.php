<?php

class Application_Form_LoginForm extends Zend_Form {
	public function __construct($args = null) {
		parent::__construct($args);

		$this->setName('Login');

		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('Email:')
			  ->setRequired(true);

		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Password:')
				 ->setRequired(true);

		$login = new Zend_Form_Element_Submit('login');
		$login->setLabel('Login');

		$this->addElements(array($email, $password, $login));
		$this->setMethod('post');
		$this->setAction('/authentification/login');
	}

}