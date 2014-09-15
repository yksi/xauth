<?php
class Application_Form_RegistrationForm extends Zend_Form
{
    public function __construct($args = null)
    {
    	parent::__construct($args);

        $this->setName('Register');

		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('Email:')
			  ->setRequired(true);

		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Password:')
				 ->setRequired(true);

		$confirmPassword = new Zend_Form_Element_Password('confirmPassword');
		$confirmPassword->setLabel('Confirm password:')
				 ->setRequired(true);

        $register = $this->createElement('submit','register');
        $register->setLabel('Sign up')
                ->setIgnore(true);

        $this->addElements(array ( $email, $password, $confirmPassword, $register ));
    }
}