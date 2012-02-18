<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    var $name = 'Users';
    var $components = array('Auth', 'Session'); // Not necessary if declared in your app controller
    function beforeFilter() {
        $this->Auth->allow('*');
    }


    /**
     *  The AuthComponent provides the needed functionality
     *  for login, so you can leave this function blank.
     */
    function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }

    function register() {
        if(!empty($this->data)) {
            $this->User->create();
            if($this->User->save($this->data)) {
                // send signup email containing password to the user
                $this->Auth->login($this->data);
                $this->redirect('/');
            }
        }
    }
    
    function admin_login(){
        
        $this->redirect('/users/login');
    }

}
