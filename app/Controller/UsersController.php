<?php  
/**
* UsersController
*/
class UsersController extends AppController {

	public $uses = array('UserInformation','User');

	function register(){
		$this->autoRender = false;
 		if($this->request->is('post')){
			$data['User'] = (array)$postdata;
			$this->request->data['User']['created_date'] = date('Y-m-d');
			$this->request->data['User']['modified_date'] = date('Y-m-d');
			$this->request->data['User']['created_ip'] = $_SERVER['REMOTE_ADDR'];
			$this->request->data['User']['modified_ip'] = $_SERVER['REMOTE_ADDR'];
			if($this->User->save($this->request->data)){
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
	function login(){
		if($this->request->is('post')){
			$this->autoRender = false;
			if($this->Auth->login()){
				$user_info = $this->UserInformation->find('all',array(
						'conditions' => array(
							'UserInformation.user_id' => $this->Session->read('Auth')['User']['id']
						)
					)
				);
				if(sizeof($user_info) != 0) {
					return json_encode(array('message' => 'success','lack_info' => false));
				}
				else {
					return json_encode(array('message' => 'success','lack_info' => true));
				}
			}
			else{
				return json_encode(array('message' => 'failed','form_validation' => 'Incorrect username or password'));
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
		$path = AuthComponent::password($this->Session->read('Auth')['User']['id']);
		$this->UserInformation->create($this->request->data);
		if($this->UserInformation->validates()){
			if($this->UserInformation->save($this->request->data)){
				return json_encode(array('message' => 'success'));
			}
		}
		else{
			$error = $this->validateErrors($this->UserInformation);
			return json_encode(array('message' => 'failed','form_validation' => $error));
		}
	}


	function logout() {
  		$this->redirect($this->Auth->logout());
  		exit;
 	}

}
?>