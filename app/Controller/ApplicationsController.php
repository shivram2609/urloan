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
		$this->loadModel("Userdetail");
		$data_arr = array();
		$data_arr = $this->Userdetail->find("first",array("conditions"=>array("Userdetail.user_id"=>$this->Session->read("Auth.User.id"))));
		if($this->request->is('post')){
			$data = $this->data;
			$data['Application']['user_id'] = $this->Session->read("Auth.User.id");
			$this->Application->save($data,array("validates"=>false));
			$this->Userdetail->id = $data_arr['Userdetail']['id'];
			$this->Userdetail->save($data,array("validates"=>false));
			$id = $this->Application->getLastInsertId();
			$this->redirect("/addfiles/".$id);
		}
	
		$terms = array();
		for($i=6;$i<=36;$i++) {
			$terms[$i] = $i;
		}
		
		$this->set(compact("terms"));
		$this->data = $data_arr;
		$this->loadModel("Province");
		$provinces = $this->Province->find("list",array("fields"=>array("Province.id","Province.name")));
		$this->set(compact("provinces"));
	}
	
	function addDocuments($applicationid = null) {
		if (!empty($applicationid)) {
			
		}
		if($this->request->is('post')){
			$this->loadModel("ApplicationDocument");
			foreach($this->data['filename'] as $key=>$val) {
				$uploadarr = array();
				if(!empty($val['name'])) {
					$newname = strtotime(date("y-m-d h:i:s")).$this->Session->read("Auth.User.id").$val['name'];
					if (move_uploaded_file($val['tmp_name'],WWW_ROOT."files/appfiles/".$newname)) {
						$uploadarr['ApplicationDocument'] = array("application_id"=>$applicationid,"filename"=>$val['name'],"file_path"=>WWW_ROOT."files/appfiles/".$newname);
						$this->ApplicationDocument->create();
						$this->ApplicationDocument->save($uploadarr);
					}
				}
			}
			$this->redirect("/confirmation/".$applicationid);
		}
	}
	
	function confirmapp($applicationid = null) {
		$this->Session->setFlash("Your Application has been send for review, we will get back to you soon.");
	}
}