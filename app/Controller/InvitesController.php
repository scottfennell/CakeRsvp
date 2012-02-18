<?php
App::uses('AppController', 'Controller');
/**
 * Invites Controller
 *
 * @property Invite $Invite
 */
class InvitesController extends AppController {

    var $components = array('Auth', 'Session');
    function beforeFilter() {
        $this->Auth->allow('home');
    }

    /**
     * index method
     *
     * @return void
     */
	public function index() {
		$this->Invite->recursive = 0;
		$this->set('invites', $this->paginate());
	}

    public function home() {
        $this->layout = "home";
        //Make sure we have data, then go ahead and allow the data to
        //be posted and shit
        if(!empty($this->data)){
            $name = $this->data['Invite']['name'];
            $email = $this->data['Invite']['email'];

            $users = $this->Invite->find('all',array(
                'conditions'=>array(
                    'name LIKE'=>"%".$name."%"
                )
            ));

            if(count($users) == 1){
                $user = $users[0]["Invite"];
                $user['confirmed'] = true;
                if(!empty($email)){
                    $user['email'] = $email;
                }

                if($this->Invite->save($user)){
                    $this->Session->setFlash("Your rsvp has been confirmed!!");
                }
            } else if(count($users)>1){
                $this->Session->setFlash("More than one person was found, please use you're exact name");
            } else {
                $this->Session->setFlash("Unable to find a match, please use the name as it appears on your invitation");
            }
        }


    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
	public function view($id = null) {
		$this->Invite->id = $id;
		if (!$this->Invite->exists()) {
			throw new NotFoundException(__('Invalid invite'));
		}
		$this->set('invite', $this->Invite->read(null, $id));
	}

    /**
     * add method
     *
     * @return void
     */
	public function add() {
		if ($this->request->is('post')) {
			$this->Invite->create();
			if ($this->Invite->save($this->request->data)) {
				$this->Session->setFlash(__('The invite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite could not be saved. Please, try again.'));
			}
		}
	}

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
	public function edit($id = null) {
		$this->Invite->id = $id;
		if (!$this->Invite->exists()) {
			throw new NotFoundException(__('Invalid invite'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Invite->save($this->request->data)) {
				$this->Session->setFlash(__('The invite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Invite->read(null, $id);
		}
	}

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Invite->id = $id;
		if (!$this->Invite->exists()) {
			throw new NotFoundException(__('Invalid invite'));
		}
		if ($this->Invite->delete()) {
			$this->Session->setFlash(__('Invite deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Invite was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    /**
     * admin_index method
     *
     * @return void
     */
	public function admin_index() {
		$this->Invite->recursive = 0;
		$this->set('invites', $this->paginate());
	}

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
	public function admin_view($id = null) {
		$this->Invite->id = $id;
		if (!$this->Invite->exists()) {
			throw new NotFoundException(__('Invalid invite'));
		}
		$this->set('invite', $this->Invite->read(null, $id));
	}

    /**
     * admin_add method
     *
     * @return void
     */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Invite->create();
			if ($this->Invite->save($this->request->data)) {
				$this->Session->setFlash(__('The invite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite could not be saved. Please, try again.'));
			}
		}
	}

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
	public function admin_edit($id = null) {
		$this->Invite->id = $id;
		if (!$this->Invite->exists()) {
			throw new NotFoundException(__('Invalid invite'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Invite->save($this->request->data)) {
				$this->Session->setFlash(__('The invite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Invite->read(null, $id);
		}
	}

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Invite->id = $id;
		if (!$this->Invite->exists()) {
			throw new NotFoundException(__('Invalid invite'));
		}
		if ($this->Invite->delete()) {
			$this->Session->setFlash(__('Invite deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Invite was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function admin_cards() {
            App::import('Vendor','bcard');
            $invites = $this->Invite->find('all');
            $all = array();
            foreach($invites as $invite){
                if(!isset($invite['Invite']['code'])){
                    $invite['Invite']['code'] = $invite['Invite']['id'];
                }
                $invite['Invite']['qrcode'] = $_SERVER['HTTP_HOST']."/".$invite['Invite']['id'];                
                $this->Invite->save($invite);
                $all[] = $invite['Invite'];
            }
            $bcard = new Bcards($all);
            $bcard->printcards('inline');            
            die();
        }
}
