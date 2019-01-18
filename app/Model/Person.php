<?php  
/**
*Person 
*/
class Person extends AppModel {
	public $useTable = 'persons';


	public $validate = array(
		'first_name' => array(
			'rule' => 'notBlank',
			'required' => true,
			'message' => 'This field must not be empty'
		),
		'last_name' => array(
			'rule' => 'notBlank',
			'required' => true,
			'message' => 'This field must not be empty'
		),
		'middle_name' => array(
			'rule' => 'notBlank',
			'required' => true,
			'message' => 'This field must not be empty'
		),
		'gender' => array(
			'rule' => 'notBlank',
			'required' => true,
			'message' => 'Please select gender'
		),
		'birthdate' => array(
			'rule' => 'notBlank',
			'required' => true,
			'message' => 'Please select birthdate'
		),
	);
}
?>