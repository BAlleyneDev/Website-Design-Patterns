<?php 
class CoordinatorModel implements ModelSelectInterface
{
	private	$_errors = null;
	private	$_result = null;
	private	$_data = array();
	private $_mysqli = null;
		
	use TraitDatabaseConnector;
	
	public function getOneRecord(array $identifiers){
		$row = null;
		
		$email = $this->_mysqli->real_escape_string($identifiers['email']);
		$password = $this->_mysqli->real_escape_string($identifiers['password']);
		
		ValidatorAbstract::ensureParameterNotEmpty( $email );
		ValidatorAbstract::ensureParameterNotEmpty( $password );

		/*$sql = 'SELECT coordinator_id, email, password, firstname, lastname, security_level FROM coordinators 
				WHERE email=\'' . $email . '\' AND password=\'' . $password . '\'';
			*/	
		$sql ='SELECT email,password
		       FROM users
			   WHERE email="'.$email.'" and password=password("'.$password.'")';			
		$this->_result = $this->_mysqli->query($sql);
		if (!$this->_result) {
			die('There was an error running the query [' . $this->_mysqli->error . ']');
		}
		if ($this->_result->num_rows != 1) {
			return false;
		}
		else {
			var_dump('Before print_r');
			return($this->_result->fetch_assoc());
			
		}
	}


	/**
	 * Retrieve all records from a table
	 */
	public function getAllRecords() { /* not defined */ }
	
}