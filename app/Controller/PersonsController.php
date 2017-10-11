<?php  
/**
*PersonsController 
*/
class PersonsController extends AppController {
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow(array()); 
	}


	function index() {
		$this->layout = 'bootstrap';
		$this->Person->virtualFields['fullname'] = 'CONCAT(Person.last_name,", ",Person.first_name," ",Person.middle_name)';
		$this->Person->virtualFields['gender'] = '((CASE Person.gender WHEN 1 THEN "Male" ELSE "Female" END))';
		$this->Person->virtualFields['age'] = 'YEAR(CURDATE()) - YEAR(birthdate) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), "-", MONTH(birthdate), "-", DAY(birthdate)) ,"%Y-%c-%e") > CURDATE(), 1, 0)';
		$data = $this->Person->find('all',array(
				'fields' => array('Person.id','Person.fullname','Person.gender','Person.age','Person.created','Person.modified','Person.created_ip','Person.modified_ip')
			)
		);

		$this->set('persons',$data);
	}

	function register(){
		$this->layout = 'bootstrap';
		if($this->request->is('post')){
			$this->Person->create();
			$this->request->data['Person']['created_ip'] = $this->request->clientIp();
			$this->request->data['Person']['modified_ip'] = $this->request->clientIp();
			if($this->Person->save($this->request->data)){
				$this->Flash->default('The person has been added', array(
				    'params' => array(
				        'class' => 'alert alert-success'
				    )
				));
				$this->redirect('/');
			}			
		}
	}

	function edit($id = null){
		$this->layout = 'bootstrap';
		if(!$id) {
			throw new Exception("Error Processing Request", 1);
		}
		$data = $this->Person->findById($id);

		if(!$data){
			throw new Exception("Error Processing Request", 1);
		}
		if($this->request->is(array('post','put'))) {
			$this->Person->id = $id;
			if($this->Person->save($this->request->data)){
				$this->Flash->default('The person has been updated', array(
				    'params' => array(
				        'class' => 'alert alert-success'
				    )
				));
				return $this->redirect('/');
			}
			$this->Flash->default('Unable to update person', array(
			    'params' => array(
			        'class' => 'alert alert-error'
			    )
			));
		}
		if(!$this->request->data){
			$dob = date_create($data['Person']['birthdate']);
			$data['Person']['birthdate'] = date_format($dob,'Y-m-d');
			$this->request->data = $data;
		}
	}

	function delete($id){
		if(!$this->request->is('get')){
			throw new Exception("Error Processing Request", 1);
		}
		if($this->Person->delete($id)){
			$this->Flash->default('The person has been deleted', array(
				    'params' => array(
				        'class' => 'alert alert-success'
			    )
			));
			return $this->redirect(array('action' => 'index'));
		}

		$this->Flash->default('Unable to delete person', array(
		    'params' => array(
		        'class' => 'alert alert-error'
		    )
		));
	}
}
?>