<?php  
/**
* UserInformation
*/
class UserInformation extends AppModel{
	public $validate = array(
		'first_name' => array(
			'notEmpty' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'Firstname must not be empty'
			)
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'Lastname must not be empty'
			)
		),
		'middle_name' => array(
			'notEmpty' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'Middlename must not be empty'
			)
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'Email must not be empty'
			),
			'validEmailRule' => array(
				'rule' => array('email'),
				'message' => 'Please supply a valid email address.'
			)
		),
		'hobby' => array(
			'notEmpty' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'Hobby must not be empty'
			)
		),
		'gender' => array(
			'rule' => 'notBlank',
			'required' => true,
			'message' => 'Please choose gender'
		),
		'birthday' => array(
			'rule' => 'notBlank',
			'required' => true,
			'message' => 'Please pick birthday'
		)
	);
}
?>