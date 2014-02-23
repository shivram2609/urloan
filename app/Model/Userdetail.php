<?php
App::uses('AppModel', 'Model');
/**
 * Userdetail Model
 *
 * @property User $User
 */
class Userdetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'type'=>"inner"
		)
	);
	
	var $validate = array(
		"first_name"=>array(
			"rule"=>"notempty",
			"message"=>"Please enter first name."
		)
	);
}
