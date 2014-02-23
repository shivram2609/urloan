<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class ApplicationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	function beforeFilter() {
		$this->layout = "default_old";
		parent::beforeFilter();
		$this->Auth->allow(array("login","signup","confirmuser"));
	}

	function apply() {
		if($this->request->is('post')){
			pr($this->data);
			die;
		}
	
		$terms = array();
		for($i=6;$i<=36;$i++) {
			$terms[$i] = $i;
		}
		$this->loadModel("Userdetail");
		$data_arr = array();
		$data_arr = $this->Userdetail->find("first",array("conditions"=>array("Userdetail.user_id"=>$this->Session->read("Auth.User.id"))));
		$this->set(compact("terms"));
		$this->data = $data_arr;
	}
}