<?php

class PagesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function dashboardAction()
    {
        if(Zend_Auth::getInstance()->hasIdentity()) {
            $db = new Application_Model_Users();
            $select = $db->select()->where("email = ?", Zend_Auth::getInstance()->getIdentity()->email);
            $role = $db->fetchRow($select)['role'];
            if($role!=2){
                $this->_redirect('/');
            }
        }
    }

    public function accountAction()
    {
        // action body
    }

    public function feedbacksAction()
    {
        if(Zend_Auth::getInstance()->hasIdentity()) {
            $db = new Application_Model_Users();
            $select = $db->select()->where("email = ?", Zend_Auth::getInstance()->getIdentity()->email);
            $role = $db->fetchRow($select)['role'];
            if($role!=1){
                $this->_redirect('/');
            }
        }
    }

    public function feedbackAction()
    {
        $form = new Application_Form_Feedback();
        $feedbacks = new Application_Model_Feedbacks();
        if($this->getRequest()->isPost()){
            if($form->isValid($_POST)){
                $data = $form->getValues();
                $feedbacks->insert($data);
                $this->_redirect('pages/account');
            }
        }
        $this->view->form = $form;
    }

    public function edituserAction()
    {

        if($role!=2){
            $this->_redirect('/');
        }

        $ID = $this->_getParam('i');
        $db = new Application_Model_Users();
        $user = $db->find(intval($ID))[0];

        $this->view->user = $user;
        $form = new Application_Form_EditUserForm();
        $this->view->form = $form;
        $form->populate(array('email' => $user->email, 'role' => Application_Model_Users::getRole($user->role)));

        if($this->getRequest()->isPost()){
            if($form->isValid($_POST)){
                $data = $form->getValues();

                $where = $db->getAdapter()->quoteInto('ID = ?', $user->ID);
                $db->update($data, $where);
                $this->_redirect('/pages/dashboard');
                $this->view->message = "Successfully updated";
            }
        }
    }


}











