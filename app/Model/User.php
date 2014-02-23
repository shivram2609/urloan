<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Userdetail $Userdetail
 */
class User extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Userdetail' => array(
			'className' => 'Userdetail',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	var $validate = array(
		"username"=>array(
			"notempty"=>array(
				"rule"=>"notempty",
				"message"=>"Please enter username."
			),
			"email"=>array(
				"rule"=>"email",
				"message"=>"Please enter valid email."
			),
			"isUnique"=>array(
				"rule"=>"isUnique",
				"message"=>"Username is already exist."
			)
		),
		"password"=>array(
			"notempty"=>array(
				"rule"=>"notempty",
				"message"=>"Please enter password."
			),
			"minLength"=>array(
				"rule"=>array("minLength",8),
				"message"=>"Password must be 8 character long."
			),
			"maxLength"=>array(
				"rule"=>array("maxLength",15),
				"message"=>"Password length can not be more than 15 characters."
			)
		),
		"oldpassword"=>array(
			"notempty"=>array(
				"rule"=>"notempty",
				"message"=>"Please enter old password."
			),
			"minLength"=>array(
				"rule"=>array("minLength",8),
				"message"=>"Old Password must be 8 character long."
			),
			"maxLength"=>array(
				"rule"=>array("maxLength",15),
				"message"=>"Old Password length can not be more than 15 characters."
			)
		),
		"newpassword"=>array(
			"notempty"=>array(
				"rule"=>"notempty",
				"message"=>"Please enter new password."
			),
			"minLength"=>array(
				"rule"=>array("minLength",8),
				"message"=>"New Password must be 8 character long."
			),
			"maxLength"=>array(
				"rule"=>array("maxLength",15),
				"message"=>"New Password length can not be more than 15 characters."
			)
		),
		"confirmpassword"=>array(
			"notempty"=>array(
				"rule"=>"notempty",
				"message"=>"Please enter confirm password."
			),
			"minLength"=>array(
				"rule"=>array("minLength",8),
				"message"=>"Confirm Password must be 8 character long."
			),
			"maxLength"=>array(
				"rule"=>array("maxLength",15),
				"message"=>"Confirm Password length can not be more than 15 characters."
			),
			"checkpass"=>array(
				"rule"=>"checkpass",
				"message"=>"New and Confirm password must match."
			)
		)
	);
	
	function checkpass() {
		if($this->data['User']['newpassword'] != $this->data['User']['confirmpassword']) {
			return false;
		} else {
			return true;
		}
	}
}
