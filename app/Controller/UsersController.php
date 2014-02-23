<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array("login","signup","confirmuser"));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function login(){
		if ($this->request->is('post')) {
			$this->__login();
		}
	}
	
	private function __login() {
		if($this->Auth->login()) {
			if ($this->Session->read("Auth.User.status") == 1) {
				$this->redirect("/profile");
			} else {
				$this->Auth->logout();
				$this->Session->setFlash("Your account has not been activated yet.");
				$this->redirect("/login");
			}
		} else {
			$this->Session->setFlash("Invalid Username or Password.");
		}
	}
	
	function logout() {
		$this->Auth->logout();
		$this->response->disableCache();
		$this->Session->destroy();
		unset($_COOKIE);
		$this->redirect("/login");
	}
	
	public function signup() {
		if ($this->request->is('post')) {
			$errFlag = 0;
			$this->loadModel("Userdetail");
			$this->User->set($this->data);
			$this->Userdetail->set($this->data);
			if ($this->User->validates()) {
				++$errFlag;
			}
			if ($this->Userdetail->validates()) {
				++$errFlag;
			}
			
			if ($errFlag == 2) {
				$data = $this->request->data;
				$data['User']['password'] = $this->Auth->password($data['User']['password']);
				$data['User']['confirmtoken'] = $this->Auth->password($data['User']['password']."--".$data['User']['password']);
				$this->User->save($data,array("validate"=>false));
				$data['Userdetail']['user_id'] = $this->User->getLastInsertId();
				if($this->Userdetail->save($data)) {
					$this->getmaildata(1);
					$link = "<a href='".SITE_LINK."confirmuser/".$data['User']['confirmtoken']."'>Click Here</a>";
					$this->message = str_replace("{USER}",$data['Userdetail']['first_name'],$this->message);
					$this->message = str_replace("{LINK}",$link,$this->message);
					$this->sendemail($this->request->data['User']['username']);
					$this->Session->setFlash("Congrats, your signup is sucessfully completed.A confirmation email has been sent to your email address, please click on confirmation link to confirm your registration.");
					$this->redirect("/login");
				}
			}
		}
	}
	
	public function confirmuser($token = NULL) {
		$this->User->recursive = -1;
		$user = $this->User->find("first",array("conditions"=>array("User.confirmtoken"=>$token)));
		if(!empty($user)) {
			if(!empty($user['User']['status'])) {
				$this->Session->setFlash("Your account is already activated.");
			} else {
				$this->User->create();
				$this->User->id = $user['User']['id'];
				$data['User']['status'] = 1;
				if ($this->User->save($data)) {
					$this->Session->setFlash("Congrats, your account has been verified.");
				} else {
					$this->Session->setFlash("Your account can not be verified.");
				}
			}
		} else {
			$this->Session->setFlash("Invalid Request.");
		}
		$this->redirect("/login");
	}
	
	public function profile() {
		
	}
	
	function changepassword() {
		if($this->request->is('post')) {
			$this->User->set($this->data);
			if($this->User->validates()) {
				$this->User->create();
				$this->User->id = $this->Session->read("Auth.User.id");
				$userpass['User']['password'] = $this->Auth->password($this->data['User']['newpassword']);
				if($this->User->save($userpass,array("validate"=>false))) {
					$this->Session->setFlash("Password has been updated successfully");
				}
			}
		}
	}
}