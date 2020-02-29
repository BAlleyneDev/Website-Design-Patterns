<?php
class Home extends PageControllerAbstract{
	protected $_tpl = null;
	private $_errors = array();
	
	public function __construct() 
	{
		$this->_makeTpl();
	}
	
	
	protected function _makeTpl()
	{
		$this->_tpl = new Template('index.tpl.php');
		$this->_tpl->setDir(APP_TEMPLATES);
	}
	
	public function run()
	{
		$HomeM = new HomeModel();
	        $recomm = $HomeM->getAllRecords();
	        $this->_tpl->assign('recomm',$recomm);
		$this->_tpl->display();
	}
}

