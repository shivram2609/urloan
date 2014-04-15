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
	public $components = array('Paginator','LenDesk');
	
	function beforeFilter() {
		$this->layout = "default";
		parent::beforeFilter();
		$this->Auth->allow(array("login","signup","confirmuser"));
	}
	
	function apply() {
		$this->checkapplication();
		$this->loadModel("Userdetail");
		$data_arr = array();
		$data_arr = $this->Userdetail->find("first",array("conditions"=>array("Userdetail.user_id"=>$this->Session->read("Auth.User.id"))));
		if($this->request->is('post')){
			if(isset($this->data['Userdetail']['birth_date']['year'])) {
				$this->loadModel("Evaluate");
				$evaluates = $this->Evaluate->find("all");
				$age = strtotime($evaluates[0]['Evaluate']['min_age']);
				$enter_age = strtotime($this->data['Userdetail']['birth_date']);
				$pr_arr = explode(",",$evaluates[0]['Evaluate']['provinces']);
				if(in_array($this->data['Userdetail']['province_id'],$pr_arr) && $enter_age >= $age) {
					$this->loadModel("Fraud");
					$fraud['Fraud']['user_id'] = $this->Session->read("Auth.User.id");
					$fraud['Fraud']['data'] = serialize($this->data);
					$this->Fraud->save($fraud);
					$this->Session->write("raw",$this->data);
					$this->Session->setFlash("Congratulations you have been pre-qualified!",'default',array("class"=>"success_message"));
				} else {
					$this->loadModel("Fraud");
					$fraud['Fraud']['user_id'] = $this->Session->read("Auth.User.id");
					$fraud['Fraud']['data'] = serialize($this->data);
					$fraud['Fraud']['attempts'] = 'Reject';
					$this->Fraud->save($fraud);
					$this->Session->delete("raw");
					$this->Session->setFlash("You are not qualified to apply for application.");
				}
			} elseif(isset($this->data['Application']['apply'])) {
				$data = $this->Session->read("raw");
				$data['Application']['user_id'] = $this->Session->read("Auth.User.id");
				$data['Application']['app_step'] = 1;
				if(empty($data['Application']['bankcrupt_status'])) {
					$data['Application']['bankcrupt_status'] = 2;
				}
				$this->Application->save($data,array("validates"=>false));
				$this->loadModel("Userdetail");
				$this->Userdetail->id = $data_arr['Userdetail']['id'];
				$this->Userdetail->save($data,array("validates"=>false));
				$id = $this->Application->getLastInsertId();
				$this->Session->delete("raw");
				$this->redirect("/add-details/".$id);
			}
			
		}
		$terms = array();
		for($i=6;$i<=36;$i++) {
			$terms[$i] = $i;
		}
		$loanamount = array();
		for($j=1000;$j<=15000;$j += 500) {
			$loanamount[$j] = $j;
		}
		
		$this->set(compact("terms","loanamount"));
		$this->data = $data_arr;
		$this->loadModel("Province");
		$provinces = $this->Province->find("list",array("fields"=>array("Province.id","Province.name")));
		$this->set(compact("provinces"));
	}
	
	function adddetails($id = NULL) {
		$this->loadModel("Userdetail");
		$data_arr = array();
		$data_arr = $this->Userdetail->find("first",array("conditions"=>array("Userdetail.user_id"=>$this->Session->read("Auth.User.id"))));
		$this->loadModel("Agent");
		//$agents = $this->Agent->find("list",array("conditions"=>array("status"=>"1"),"fields"=>array("id","name")));
		//$agents["other"] = "Other";
		if(isset($this->data) && !empty($this->data) && !empty($id)){
			$data = $this->data;
			$data['Application']['user_id'] = $this->Session->read("Auth.User.id");
			//$data['Application']['province_id'] = $data['Application']['province'];
			if(is_array($data['Application']['assetsline'])) {
				$data['Application']['assetsline'] = serialize($data['Application']['assetsline']);
			}
			if(is_array($data['Application']['assets'])) {
				$data['Application']['assets'] = serialize($data['Application']['assets']);
			}
			if(is_array($data['Application']['liabilityline'])) {
				$data['Application']['liabilityline'] = serialize($data['Application']['liabilityline']);
			}
			if(is_array($data['Application']['liabilities'])) {
				$data['Application']['liabilities'] = serialize($data['Application']['liabilities']);
			}
			if(is_array($data['Application']['expenselist'])) {
				$data['Application']['expenselist'] = serialize($data['Application']['expenselist']);
			}
			if(is_array($data['Application']['expenses'])) {
				$data['Application']['expenses'] = serialize($data['Application']['expenses']);
			}
			$this->Application->id = $id; 
			$data['Application']['app_step'] = 2;
			$this->Application->save($data,array("validates"=>false));
			$this->Userdetail->id = $data_arr['Userdetail']['id'];
			$this->Userdetail->save($data,array("validates"=>false));
			$this->redirect("/banking-details/".$id);
		} elseif(!empty($id)) {
			$this->Application->bindModel(
				array('belongsTo' => array(
						'Userdetail' => array(
							'className' => 'Userdetail',
							'foreignKey'=>false,
							"conditions"=>"Application.user_id = Userdetail.user_id"
						)
					)
				)
			);
			$datas = $this->Application->find("first",array("conditions"=>array("Application.id"=>$id)));
			//pr($datas);
			$this->data = $datas;
		}
		//$this->set(compact("agents"));
		$this->loadModel('Province');
		$provinces = $this->Province->find("list",array("fields"=>array("Province.id","Province.name")));
		$this->loadModel("StreetType");
		$streettypes = $this->StreetType->find("list",array("conditions"=>array("status"=>1),"fields"=>array("StreetType.id","StreetType.heading")));
		$addresscount[0] = 'Less than 1 Year';
		$addresscount[1] = '1 Year';
		for($ac = 2;$ac <= 20 ; $ac++) {
			$addresscount[$ac] = $ac." Years";
		}
		$addresscount[21] = '20+ Years';
		$this->set(compact("provinces","streettypes",'addresscount'));
	}
	
	function addDocuments($applicationid = null) {
		$this->loadModel("ApplicationDocument");
		if (!empty($applicationid)) {
			$app = $this->ApplicationDocument->find("all",array("conditions"=>array("ApplicationDocument.application_id"=>$applicationid)));
		}
		if(isset($this->data) && !empty($this->data)){
			$flag = false;
			$app = $this->ApplicationDocument->find("all",array("conditions"=>array("ApplicationDocument.application_id"=>$applicationid)));
			$i = 0;
			$uploadarr = array();
			foreach($this->data['ApplicationDocument'] as $key=>$val) {
				$filename = "filename".$i++;
				if(!empty($val['name'])) {
					//echo $val[$filename]['name'];
					$newname = strtotime(date("y-m-d h:i:s")).$this->Session->read("Auth.User.id").$val['name'];
					if (move_uploaded_file($val['tmp_name'],WWW_ROOT."files/appfiles/".$newname)) {
						$uploadarr['ApplicationDocument'][$filename] = $val['name'];
						$uploadarr['ApplicationDocument'][$filename."_path"] = WWW_ROOT."files/appfiles/".$newname;
						$flag = true;
					}
				}
			}
			$this->ApplicationDocument->create();
			if(!empty($app)) {
				$this->ApplicationDocument->id = $app[0]['ApplicationDocument']['id'];
			}
			if(!empty($uploadarr)) {
				$uploadarr['ApplicationDocument']['application_id'] = $applicationid;
				$this->ApplicationDocument->save($uploadarr);
			}
			
			if ($flag) {
				$app['Application']['appstatus'] = 'In Process';
				$app['Application']['app_step'] = 4;
				$this->Application->create();
				$this->Application->id = $applicationid;
				$this->Application->save($app);
			}
			$this->redirect("/confirmation/".$applicationid);
		}
		if(!empty($app)) {
			$this->data = $app[0];
		}
		$this->set(compact("applicationid"));
	}
	
	function confirmapp($applicationid = null) {
		$this->Session->setFlash("Your Application has been send for review, we will get back to you soon.");
	}
	
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Application->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('Application.user_id' => $this->Session->read("Auth.User.id")),
			'limit' => 10,
			'order'=>'Application.created desc'
		);
		$this->set('applications', $this->Paginator->paginate());
	}
}