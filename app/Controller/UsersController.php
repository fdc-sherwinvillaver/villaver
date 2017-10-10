<?php  
/**
* UsersController
*/
class UsersController extends AppController {

	public $uses = array('UserInformation','User');

	function register(){
		$this->autoRender = false;
		$postdata = array();
	 	$postdata = (array)$this->request->input('json_decode');
	 	if(sizeof($postdata) != 0){
	 		if($this->request->is('post')){
				$data['User'] = (array)$postdata;
				$data['User']['created_date'] = date('Y-m-d');
				$data['User']['modified_date'] = date('Y-m-d');
				$data['User']['created_ip'] = $_SERVER['REMOTE_ADDR'];
				$data['User']['modified_ip'] = $_SERVER['REMOTE_ADDR'];
				if($this->User->save($data)){
					$dataLogin['User']['username'] = $data['User']['username'];
					$dataLogin['User']['password'] = AuthComponent::password($data['User']['password']);
					$dataLogin['User']['id'] = $this->User->getLastInsertId();
					if($this->Auth->login($dataLogin['User'])){
						$user = $this->UserInformation->find('all',array(
								'conditions' => array(
									'UserInformation.user_id' => $this->User->getLastInsertId()
								)
							)
						);
						if(sizeof($user) != 0){
							return json_encode(array('message' => 'success','lack_info' => false));
						}
						else{
							return json_encode(array('message' => 'success','lack_info' => true));
						}
					}
				}
				else{
					$errors = $this->User->validationErrors;
					return json_encode(array('message' => 'failed','form_validation' => $errors));
				}
			}
	 	}
	 	else{
	 		$data['User'] = array(
	 			'username' => '',
	 			'password' => '',
	 			'confirm_password' => ''
	 		);
	 		$this->User->create($data);
	 		if(!$this->User->save($data)){
				$errors = $this->User->validationErrors;
				return json_encode(array('message' => 'failed','form_validation' => $errors));
			}
	 	}
		
	}
	function login(){
		// if($this->request->is('post')){
		// 	$this->autoRender = false;
		// 	$postdata = array();
		//  	$postdata = (array)$this->request->input('json_decode');
		//  	if(sizeof($postdata) != 0){
	 // 			if($this->request->is('post')){
		// 			$data['User'] = (array)$postdata;
		// 			$data['User']['password'] = AuthComponent::password($data['User']['password']);
		// 			unset($data['user']['confirm_password']);
		// 			$this->request->data['User']['username'] = $data['User']['username'];
		// 			$this->request->data['User']['password'] = $data['User']['password'];
		// 			$user = $this->User->find('all',array(
		// 					'conditions' => array(
		// 						'User.username' => $data['User']['username'],
		// 						'User.password' => $data['User']['password']
		// 					)
		// 				)
		// 			);
		// 			if(sizeof($user) > 0) {
		// 				$this->request->data['User']['id'] = $user[0]['User']['id'];
		// 				if($this->Auth->login($this->request->data['User'])){
		// 					$user_info = $this->UserInformation->find('all',array(
		// 							'conditions' => array(
		// 								'UserInformation.user_id' => $user[0]['User']['id']
		// 							)
		// 						)
		// 					);
		// 					if(sizeof($user_info) != 0) {
		// 						return json_encode(array('message' => 'success','lack_info' => false));
		// 					}
		// 					else {
		// 						return json_encode(array('message' => 'success','lack_info' => true));
		// 					}
		// 				}
		// 			}
		// 			else{
		// 				return json_encode(array('message' => 'falied','form_validation' => "Incorrect username or password"));
		// 			}
		// 		}
		//  	}
		//  	else{
		//  		$data['User'] = array(
		//  			'username' => '',
		//  			'password' => '',
		//  		);
		//  		$this->User->create($data);
		//  		if(!$this->User->save($data)){
		// 			$errors = $this->User->validationErrors;
		// 			return json_encode(array('message' => 'failed','form_validation' => $errors));
		// 		}
		//  	}
		// }
		// else{
		// 	if(isset($this->Session->read('Auth')['User'])){
		// 		return $this->redirect($this->Auth->redirectUrl());
		// 	}
		// 	else{
		// 		$this->layout = 'bootstrap';
		// 	}
		// }
		if($this->request->is('post')){
			$this->autoRender = false;
			if($this->Auth->login()){
				pr('success');
			}
		}
		else{
			$this->layout = 'bootstrap';
		}
	}

	function update_profile() {
		$this->layout = 'bootstrap';
	}

	function getInfo(){
		$this->autoRender = false;
		$data = $this->UserInformation->find('all',array(
				'conditions' => array(
					'UserInformation.user_id' => $this->Session->read('Auth')['User']['id']
				)
			)
		);
		if(sizeof($data) > 0){
			return json_encode($data);
		}
	}

	function profile() {
		$data = $this->UserInformation->find('all',array(
				'conditions' => array(
					'UserInformation.user_id' => $this->Session->read('Auth')['User']['id']
				)
			)
		);
		if(sizeof($data) > 0){
			$this->layout = 'bootstrap';
		}
		else{
			$this->redirect('/users/update_profile');
		}
	}

	function registerInfo(){
		$this->autoRender = false;
		$data_info = $this->UserInformation->find('all',array(
				'conditions' => array(
					'UserInformation.user_id' => $this->Session->read('Auth')['User']['id']
				)
			)
		);

		$postdata['UserInformation'] = (array)$this->request->input('json_decode');
		$data['UserInformation'] = array(
 			'first_name' => '',
 			'last_name' => '',
 			'middle_name' => '',
 			'email' => '',
 			'gender' => '',
 			'birthday' => '',
 			'hobby' => ''
 		);
 		foreach ($postdata['UserInformation'] as $key => $value) {
 			$data['UserInformation'][$key] = $value;
 		}
		$this->UserInformation->set($data);
 		if ($this->UserInformation->validates()) {
 			if(sizeof($data_info) > 0){
 				$this->UserInformation->id = $data_info[0]['UserInformation']['id'];
 			}
 			else{
 				$data['UserInformation']['user_id'] = $this->Session->read('Auth')['User']['id'];
 			}
		    if($this->UserInformation->save($data)){
		    	return json_encode(array('message' => 'success'));
		    }
		}
		else{
			$errors = $this->UserInformation->validationErrors;
		    return json_encode(array('message' => 'failed','form_validation' => $errors));
		}
	}


	function logout() {
  		$this->redirect($this->Auth->logout());
  		exit;
 	}

}
?>