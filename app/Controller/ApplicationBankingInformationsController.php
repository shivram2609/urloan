<?php
App::uses('AppController', 'Controller');
/**
 * ApplicationBankingInformations Controller
 *
 * @property ApplicationBankingInformation $ApplicationBankingInformation
 * @property PaginatorComponent $Paginator
 */
class ApplicationBankingInformationsController extends AppController {

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
		$this->ApplicationBankingInformation->recursive = 0;
		$this->set('applicationBankingInformations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ApplicationBankingInformation->exists($id)) {
			throw new NotFoundException(__('Invalid application banking information'));
		}
		$options = array('conditions' => array('ApplicationBankingInformation.' . $this->ApplicationBankingInformation->primaryKey => $id));
		$this->set('applicationBankingInformation', $this->ApplicationBankingInformation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=NULL) {
	$this->layout ="default_old";
		if (isset($this->data) && !empty($this->request->data)) {
			$this->ApplicationBankingInformation->create();
			$data = $this->request->data;
			$data['ApplicationBankingInformation']['application_id'] = $id;
			//pr($data);
			//die;
			if ($this->ApplicationBankingInformation->save($data)) {
				$this->Session->setFlash(__('The application banking information has been saved.'));
				$this->loadModel("Application");
				$this->Application->create();
				$this->Application->id = $id;
				$app['Application']['app_step'] = 3;
				$this->Application->save($app);
				$this->redirect("/addfiles/".$id);
			} else {
				$this->Session->setFlash(__('The application banking information could not be saved. Please, try again.'));
			}
		}
		$applications = $this->ApplicationBankingInformation->find('first',array("conditions"=>array("ApplicationBankingInformation.application_id"=>$id)));
		$this->set("applicationid",$id);
		$this->data = $applications;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ApplicationBankingInformation->exists($id)) {
			throw new NotFoundException(__('Invalid application banking information'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ApplicationBankingInformation->save($this->request->data)) {
				$this->Session->setFlash(__('The application banking information has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The application banking information could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ApplicationBankingInformation.' . $this->ApplicationBankingInformation->primaryKey => $id));
			$this->request->data = $this->ApplicationBankingInformation->find('first', $options);
		}
		$applications = $this->ApplicationBankingInformation->Application->find('list');
		$this->set(compact('applications'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ApplicationBankingInformation->id = $id;
		if (!$this->ApplicationBankingInformation->exists()) {
			throw new NotFoundException(__('Invalid application banking information'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ApplicationBankingInformation->delete()) {
			$this->Session->setFlash(__('The application banking information has been deleted.'));
		} else {
			$this->Session->setFlash(__('The application banking information could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
