<?php

class AuthentificationController extends Zend_Controller_Action
{

    public function init()
    {

    }

    public function indexAction()
    {

    }

    public function loginAction()
    {
        if(Zend_Auth::getInstance()->hasIdentity()){
            $this->_redirect('/');
        }


        $request = $this->getRequest();
        $form = new Application_Form_LoginForm();
        if ($request->isPost() && $form->isValid($this->_request->getPost())) {
            $adapter = $this->getAdapter();
            $email = $form->getValue('email');
            $password = $form->getValue('password');

            $adapter->setIdentity($email)
                    ->setCredential($password);

            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate($adapter);

            if ($result->isValid()) {
                $identity = $adapter->getResultRowObject();
                $storage = $auth->getStorage();
                $storage->write($identity);
                $this->_redirect('/');
            } else {
                $this->view->errorMessage = "Username or password is wrong";
            }
        }
        $this->view->form = $form;

    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }

    private function getAdapter()
    {
        $adapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $adapter->setTableName('users')
                ->setIdentityColumn('email')
                ->setCredentialColumn('password');
        return $adapter;
    }

    public function registerAction()
    {
        $form = new Application_Form_RegistrationForm();
        $users = new Application_Model_Users();
        if($this->getRequest()->isPost()){
            if($form->isValid($_POST)){
                $data = $form->getValues();
                if($data['password'] != $data['confirmPassword']){
                    $this->view->errorMessage = "Password and confirm password don't match.";
                    return;
                }
                unset($data['confirmPassword']);
                $users->insert($data);
                $this->_redirect('authentification/login');
            }
        }
        $this->view->form = $form;
    }


}







