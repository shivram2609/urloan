<?php
App::uses('AppController', 'Controller');
/**
 * Userdetails Controller
 *
 * @property Userdetail $Userdetail
 * @property PaginatorComponent $Paginator
 */
class UserdetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Userdetail->recursive = 0;
		$this->set('userdetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function profile() {
	$this->layout = "default_old";
		$options = array('conditions' => array('Userdetail.user_id'=>$this->Session->read("Auth.User.id")));
		$this->set('userdetail', $this->Userdetail->find('first', $options));
		$this->render("view");
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Userdetail->create();
			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userdetail could not be saved. Please, try again.'));
			}
		}
		$users = $this->Userdetail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	$this->layout = "default_old";
		if (!$this->Userdetail->exists($id)) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userdetail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Userdetail.' . $this->Userdetail->primaryKey => $id));
			$this->request->data = $this->Userdetail->find('first', $options);
		}
		$users = $this->Userdetail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Userdetail->id = $id;
		if (!$this->Userdetail->exists()) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Userdetail->delete()) {
			$this->Session->setFlash(__('The userdetail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The userdetail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
