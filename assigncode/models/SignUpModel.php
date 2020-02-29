<?php
class SignUpModel implements ModelInsertInterface
{
    private	$_errors = null;
	private	$_result = null;
	private	$_data = array();
	private $_mysqli = null;
		
	use TraitDatabaseConnector;
	
	function newRecord(array $recordInfo){
		$row = null;
		extract($recordInfo);
		$email = $this->_mysqli->real_escape_string($recordInfo['email']);
		$password = $this->_mysqli->real_escape_string($recordInfo['password']);
		
		ValidatorAbstract::ensureParameterNotEmpty( $email );
		ValidatorAbstract::ensureParameterNotEmpty( $password );
		
		$sql = 'INSERT INTO users(name,email,password)
		        VALUES("'.$formFullName.'","'.$email.'", password("'.$password.'"))';
		$this->_result = $this->_mysqli->query($sql);

		if (!$this->_result) {
			die('There was an error running the query [' . $this->_mysqli->error . ']');
		}
		
	}
	
}