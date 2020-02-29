<?php

class Validator extends ValidatorAbstract{
	
	function isRequestDataValid(array $requestData, array $pageVars){
		$this->_pageVarData=$pageVars;
        $this->_errors=[];
		
        foreach ($requestData as $VarName => $value)
        {

          if (array_key_exists($VarName, $pageVars))
          {
		
            $method='_'.$pageVars[$VarName]['validationmethod'];
            $this->$method($VarName, $value, $pageVars[$VarName]['label']);
          }

          else
		  {
          trigger_error(' Request id not valid' . $pageVars, E_USER_ERROR);
		  }
        }

        if (!empty($this->_errors))
		{
                return false;
		}
        else
		{
            return true;
		}
	}
	
	function isPageNameValid($pageName){
		
	}
	
	function _checkPassword($variablename, $variable, $label){
		if(isset($variable))
		{
			if(preg_match('/(?=.*[A-Z])(?=.*\-?)(?=.*[0-9])[\w-]{8,}/',$variable))
			{
				
			}
			else{
				$this->_errors['password'] = "$label: Invalid password format.";
			}
		}
	}
	
	function _checkrePassword($variablename, $variable, $label){
		if(isset($variable))
		{		
			if(preg_match('/(?=.*[A-Z])(?=.*\-?)(?=.*[0-9])[\w-]{8,}/',$variable))
			{
				
			}
			else{
				$this->_errors['rePass'] = "$label: Invalid reEnter password format.";
			}
		}
	}
	
	function _checkFullname($variablename, $variable, $label){
		if(isset($variable))
		{
			if(preg_match('/^[a-zA-Z]+(([.a-zA-Z][^.\-\d_a-zA-Z][^\s]?[a-zA-Z]*)?([\-a-zA-Z][^\-\s\d_.][a-zA-Z]*)?)*$/',$variable))
			{
				
			}
			else{
				$this->_errors['fullName'] = "$label: Invalid full name format.";
			}
		}
	}
	
	function _checkTerms($variablename, $variable, $label){
		
		if(isset($variable))
		{
			if($variable == 'on')
			{
				
			}
			else{
				$this->_errors['check'] = "$label: Not checked.";
			}
		}else{
			$this->_errors['check'] = "$label: Not checked.";
		}
	}
	
	
	
	static function makeValidatorSingleton(){
		if(Session::read('Validator') == null)
		{
			self::$_instance = new Validator();
			Session::write('Validator', self::$_instance);
		}
		return Session::read('Validator');
	}
}
	



?>