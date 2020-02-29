<?php

class SignUp extends PageControllerAbstract{
	private $_errors = array();
	
	public function __construct() 
	{
		$this->_makeTpl();
	}
	
	function _makeTpl(){
		$this->_tpl = new Template('signup.tpl.php');
		$this->_tpl->setDir(APP_TEMPLATES);
	}
	
	function run(){
	
		if($_POST)
		{
			
			// create a validator for this page
			$validator = Validator::makeValidatorSingleton();
			
			// validate the data and stop processing if the
			// data is in the incorrect format
			$allVars = $ini_array = parse_ini_file(INCLUDE_DIR . '/dataLibrary.ini', true);
			foreach ($allVars as $vars=>$varDetails) {
				if (in_array('SignUp', $varDetails['inpage'])) {
					$pageVars[$vars] = $varDetails;
				}
			}
			if (!$validator->isRequestDataValid($_POST, $pageVars)) {
				$this->_errors = $validator->getValidationErrors();
				 if($_POST['password'] != $_POST['repassword'])
				 {
					 array_push($this->_errors,"Passwords do not match.");
				 }
				 
				 if(!isset($_POST['terms']))
				 {
					 array_push($this->_errors,"YOU MUST AGREE TO THE TERMS");
				 }	 
				 
			}
			else {
				if(isset($_POST['terms']))
			{
			  if($_POST['password'] != $_POST['repassword'])
			  {
				 $this->_errors['noMatch']="Passwords do not match.";
			  }
			  else{
				$SignUpM = new SignUpModel();
			    $SignUpM->newRecord($_POST);
				header('Location: index.php?controller=Login');
			  }
			  
			}
			else {
				    $this->_errors['check'] = "YOU MUST AGREE TO THE TERMS";
					$this->_errors[] = $validator->getValidationErrors();
					$this->_errors[0]['check'] = "YOU MUST AGREE TO THE TERMS";
				}
				
			}
			
			
			
		}
		if ($this->_errors) {
			$this->_tpl->assign('errors', $this->_errors);
		}
		$this->_tpl->display();
	}
}