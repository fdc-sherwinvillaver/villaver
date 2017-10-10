<?php  
/**
* HomeController
*/
class HomeController extends AppController {

	public $uses = array('UserInformation');

	function index(){
		$this->layout = 'bootstrap';
	}
}
?>