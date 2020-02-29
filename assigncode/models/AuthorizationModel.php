<?php 
class AuthorizationModel implements ModelSelectInterface
{
	private	$_errors = null;
	private	$_result = null;
	private	$_data = array();
	private $_mysqli = null;
		
	use TraitDatabaseConnector;
	
	public function getOneRecord(array $identifiers){
		$row = null;
		
		$userid = $this->_mysqli->real_escape_string($identifiers['coordinator_id']);
		$pagename = $this->_mysqli->real_escape_string($identifiers['page_name']);

		$sql = 'SELECT p.page_id FROM
					(SELECT * FROM pages
						WHERE page_name=\'' . $pagename . '\') as p,
						pages_authorizations as pa
				WHERE p.page_id = pa.page_id
				  AND pa.coordinator_id = ' . $userid;
				  
		$this->_result = $this->_mysqli->query($sql);

		if (!$this->_result) {
			die('There was an error running the query [' . $this->_mysqli->error . ']');
		}
		if ($this->_result->num_rows != 1) {
			return false;
		}
		else {
			return ($this->_result->fetch_assoc());
		}
	}


	/**
	 * Retrieve all records from a table
	 */
	public function getAllRecords() { /* not defined */ }
	
}