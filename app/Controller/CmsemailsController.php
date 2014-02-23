<?php
App::uses('AppController', 'Controller');
/**
 * Cmsemails Controller
 *
 * @property Cmsemail $Cmsemail
 * @property PaginatorComponent $Paginator
 */
class CmsemailsController extends AppController {

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
		$this->Cmsemail->recursive = 0;
		$this->set('cmsemails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cmsemail->exists($id)) {
			throw new NotFoundException(__('Invalid cmsemail'));
		}
		$options = array('conditions' => array('Cmsemail.' . $this->Cmsemail->primaryKey => $id));
		$this->set('cmsemail', $this->Cmsemail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cmsemail->create();
			if ($this->Cmsemail->save($this->request->data)) {
				$this->Session->setFlash(__('The cmsemail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cmsemail could not be saved. Please, try again.'));
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
		if (!$this->Cmsemail->exists($id)) {
			throw new NotFoundException(__('Invalid cmsemail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cmsemail->save($this->request->data)) {
				$this->Session->setFlash(__('The cmsemail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cmsemail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cmsemail.' . $this->Cmsemail->primaryKey => $id));
			$this->request->data = $this->Cmsemail->find('first', $options);
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
		$this->Cmsemail->id = $id;
		if (!$this->Cmsemail->exists()) {
			throw new NotFoundException(__('Invalid cmsemail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cmsemail->delete()) {
			$this->Session->setFlash(__('The cmsemail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cmsemail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
