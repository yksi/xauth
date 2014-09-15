<?php

class Application_Form_EditUserForm extends Zend_Form
{
	public function __construct($args = null) {
		parent::__construct($args);

		$this->setName('Login');

		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('Email:')
			  ->setRequired(true);

		$role = new Zend_Form_Element_Select('role');
		$role->setLabel('role:')
		 	 ->addMultiOptions(array(0 => 'user', 1 => 'moderator', 2 => 'admin'))
			 ->setRequired(true);

		$save = new Zend_Form_Element_Submit('save');
		$save->setLabel('Save');

		$this->addElements(array($email, $role, $save));
		$this->setMethod('post');
		$this->setAction('/pages/edituser?i='.$_GET['i']);
	}

}