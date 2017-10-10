<?php  
/**
* UserModel
*/
class User extends AppModel {

	public $validate = array(
		'username' => array(
			'username_notBlank' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'This field must not be empty'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Username already exists'
			),
			'length' => array(
				'rule' => array('minLength',8),
				'message' => 'Username must be 8 characters above'
			)
		),
		'password' => array(
			'password_notBlank' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'This field must not be empty'
			),
			'length' => array(
				'rule' => array('lengthBetween',8,16),
				'message' => 'Password must be 8 to 16 characters'
			),
			'password_case' => array(
				'rule' => '((?=.*[A-Z])(?=.*[a-z]))',
				'message' => 'Password must have 1 uppercase and 1 lowercase'
			)
		),
		'confirm_password' => array(
			'confirm_notBlank' => array(
				'rule' => 'notBlank',
				'required' => true,
				'message' => 'This field must not be empty'
			),
			'length' => array(
				'rule' => array('lengthBetween',8,16),
				'message' => 'Password must be 8 to 16 characters'
			),
			'same_password' => array(
				'rule' => array('validate_passwords'),
				'message' => 'Password not match the confirm password'
			)
		)
	);

	public function validate_passwords() {
	    return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
	}

	public function beforeSave($options = array()){
		if(isset($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
?>