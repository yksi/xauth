<?php

class Application_Form_Feedback extends Zend_Form
{

    public function __construct($args = null)
    {
        parent::__construct($args);

        $this->setName('SendFeedback');

		$theme = new Zend_Form_Element_Text('theme');
		$theme->setLabel('Theme:')
			  ->setRequired(true);

		$message = new Zend_Form_Element_Textarea('message');
		$message->setLabel('Message:')
				 ->setRequired(true);

		$user_email = new Zend_Form_Element_Hidden('user_email');
		$user_email->setValue(Zend_Auth::getInstance()->getIdentity()->email);

        $send = $this->createElement('submit','send');
        $send->setLabel('Send')
             ->setIgnore(true);

        $this->addElements(array ( $theme, $message, $user_email, $send ));
    }


}

