<?php

class Streams extends PageControllerAbstract{
	private $_errors = array();
	
	public function __construct() 
	{
		$this->_makeTpl();
	}
	
	function _makeTpl(){
		$this->_tpl = new Template('streams.tpl.php');
		$this->_tpl->setDir(APP_TEMPLATES);
	}
	
	function run(){
		
		$StreamsM = new StreamsModel();
		$streams=$StreamsM->getAllRecords();
		
		$this->_tpl->assign('streams', $streams);
		// if errors or not, display the login page
		if ($this->_errors) {
			$this->_tpl->assign('errors', $this->_errors);
		}
		$this->_tpl->display();
	}
}