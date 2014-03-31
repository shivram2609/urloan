<?php
App::uses('AppModel', 'Model');
/**
 * ApplicationBankingInformation Model
 *
 * @property Application $Application
 */
class ApplicationBankingInformation extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Application' => array(
			'className' => 'Application',
			'foreignKey' => 'application_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
