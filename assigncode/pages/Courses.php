<?php

class Courses extends PageControllerAbstract{
	
	private $_errors = array();
	
	public function __construct() 
	{
		$this->_makeTpl();
	}
	
	function _makeTpl(){
		$this->_tpl = new Template('courses.tpl.php');
		$this->_tpl->setDir(APP_TEMPLATES);
	}
	
	function run(){
		$CoursesM = new CoursesModel();
		$courses=$CoursesM->getAllRecords();
		$maxError;
		$courseAdded;
		
		if(isset($_GET['id'])){
			
			//if user authenticated then insert using their id(email)
			$user = Member::getUserSingleton();
			if($user->isIdSet()){
				$num_profile=$CoursesM->getNumRecords($user->getId());
				if($num_profile < 8)
				{
				$data = array($_GET,$user->getId());
				$CoursesM->newRecord($data);
				$courseAdded="This course has been added to your profile";
				$this->_tpl->assign('courseAdded', $courseAdded);
				}
				else{
					$maxError="Maximum number of courses exceeded. Please go to your profile and remove a course
before registering for another.";
                $this->_tpl->assign('maxError', $maxError);
				}
			}
			else{
				header('Location:index.php?controller=Login');
				return;
			}
		}
		
		$this->_tpl->assign('courses', $courses);
		// if errors or not, display the login page
		if ($this->_errors) {
			$this->_tpl->assign('errors', $this->_errors);
		}
		$this->_tpl->display();
	}
}