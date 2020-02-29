<?php 
class Profile extends PageControllerAbstract{
	
    private $_errors = array();
	
	public function __construct() 
	{
		$this->_makeTpl();
	}
	
	function _makeTpl(){
		$this->_tpl = new Template('profile.tpl.php');
		$this->_tpl->setDir(APP_TEMPLATES);
	}
	
	function run(){
		$user = Member::getUserSingleton();
		if($user->isIdSet()){
		$ProfileM = new ProfileModel();
		$numCourses=$ProfileM->getNumRecords($user->getId());
		if($numCourses < 1){
			$noCourses= 'You have not registered for any courses.';
			$this->_tpl->assign('noCourses', $noCourses);
		}
		$profileData=$ProfileM->getAllRecords();
		$this->_tpl->assign('profileData', $profileData);
		}
		else
		{
		  header('Location: index.php?controller=Login');
		}
	
		$this->_tpl->display();
	}
}