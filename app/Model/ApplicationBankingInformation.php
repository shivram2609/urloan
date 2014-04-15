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
	
	function getappinfo($id = null) {
		$sql = "select concat(Userdetail.`salutation`,'. ',Userdetail.`first_name`,' ',Userdetail.`last_name`) as full_name,User.username email,Userdetail.mobile_phone phone_number,Userdetail.city as city,Province.iso as province,Province.name as province_name,Userdetail.postal_code postal_code,Userdetail.`street_address`,Application.`amount` loan_amount,Userdetail.`gender`,Userdetail.`birth_date`,Userdetail.`work_phone`,Userdetail.`work_phone_extension`,Userdetail.`home_phone`,Application.`purpose` as loanPurpose,Application.`referredby` ,Application.`dependents` noOfDependents,Application.`contacttime`  SuitableContacttime,Application.`carstatus`,Application.`maritalstatus`,Application.`empstatus` EmployementSatatus,Application.`curr_comp_time` TimeInCurrentComanyinMonths,Application.`company`,Application.`position`,Application.`empmainline` EmployerMainLine,Application.`pay`,Application.`payfreq` payfrequency,Application.`how_paid` HowgetPaid,Application.`last_pay`,Application.`next_pay`,Application.`empcontact`,Application.`bankcrupt_status`,Application.`created`,Application.`modified`,ApplicationBankingInfo.`institute_number`,ApplicationBankingInfo.`transit_number`,ApplicationBankingInfo.`account_number`,ApplicationBankingInfo.`name_of_account`,ApplicationBankingInfo.`second_name_of_account`,ApplicationBankingInfo.`type` AccountType from applications Application Inner Join users User on Application.user_id = User.id Inner Join userdetails Userdetail on User.id = Userdetail.user_id Inner Join `application_banking_informations` ApplicationBankingInfo on Application.id = ApplicationBankingInfo.application_id Inner Join provinces Province on Userdetail.province_id = Province.id where Application.id =".$id;
		$result = $this->query($sql);
		$return = array();
		if(!empty($result)) {
			$result = $result[0];
			$return = array("full_name"=>$result[0]['full_name'],"email"=>$result['User']['email'],"phone_number"=>$result['Userdetail']['phone_number'],"city"=>$result['Userdetail']['city'],"province"=>$result['Province']['province'],"province"=>$result['Userdetail']['postal_code'],"street_address"=>$result['Userdetail']['street_address'],"loan_amount"=>$result['Application']['loan_amount'],'ip_address'=>$_SERVER['REMOTE_ADDR']);
			foreach( $result as $key=>$val) {
				if(is_array($result[$key])) {
					foreach ( $result[$key] as $key1=>$val1 ) {
						if(!array_key_exists($key1,$return)) {
							$return[$key1] = $val1;
						}
					}
				}
			}
		}
		return $return;
	}
}
