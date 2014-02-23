<?php

App::uses('Controller', 'Controller');
class AppController extends Controller {
	
	var $components = array("Session","Auth"=>array(
						'fields'=>array('username'=>'username','password'=>'password'),
						"userModel"=>array('User'),
						'loginAction'=>array('controller'=>'users','action'=>'login'),
						'logoutRedirect'=>array('controller'=>'users','action'=>'login'),
						'loginRedirect'=>array('controller'=>'users','action'=>'profile')
					  ));
	
	public $from_mail    = 'shivamsharma586@gmail.com';
	public $subject_mail = 'test';
	public $message      = 'test';
	
	public function beforeFilter() {
		
	}
	
	function sendemail($to = NULL) {
		App::uses('CakeEmail', 'Network/Email');
		$Email = new CakeEmail();
		$Email->from(array($this->from_mail => 'Urloan.com'));
		$Email->to($to);
		$Email->subject($this->subject_mail);
		try {
			$Email->send($this->message);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	function getmaildata($id = null){
		$this->loadModel('Cmsemail');
		$maildata = $this->Cmsemail->find("first",array("conditions"=>array("id"=>$id)));
		$this->from_mail = $maildata['Cmsemail']['from_mail'];
		$this->subject_mail = $maildata['Cmsemail']['subject_mail'];
		$this->message = $maildata['Cmsemail']['message'];
	}
}
