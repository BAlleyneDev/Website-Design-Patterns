<?php
class QuestionUnenroll extends PageControllerAbstract{
	
	private $_errors = array();
	
	public function __construct() 
	{
		$this->_makeTpl();
	}
	
	function _makeTpl(){
		$this->_tpl = new Template('questionunenroll.tpl.php');
		$this->_tpl->setDir(APP_TEMPLATES);
	}
	
	function run(){
	    $UnenrollM = new QuestionUnenrollModel();
		$course=$UnenrollM->getOneRecord($_GET);
		$this->_tpl->assign('course', $course);
		$this->_tpl->display();
	}
	
}