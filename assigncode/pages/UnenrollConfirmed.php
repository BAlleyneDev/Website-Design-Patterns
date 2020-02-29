<?php
class UnenrollConfirmed extends PageControllerAbstract{
	
		
    private $_errors = array();
	
	public function __construct() 
	{
		$this->_makeTpl();
	}
	
	function _makeTpl(){
		$this->_tpl = new Template('unenrollconfirmed.tpl.php');
		$this->_tpl->setDir(APP_TEMPLATES);
	}
	
	function run(){
	   $UnenrollConfirmM = new UnenrollConfirmedModel();
	   $UnenrollConfirmM->newRecord($_GET); 
	   $this->_tpl->display();
	}
}