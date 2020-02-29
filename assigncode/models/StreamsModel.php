<?php

class StreamsModel implements ModelSelectInterface{
	private	$_errors = null;
	private	$_result = null;
	private	$_data = array();
	private $_mysqli = null;
		
	use TraitDatabaseConnector;
	
	public function getOneRecord(array $identifiers){

	}
	

	/**
	 * Retrieve all records from a table
	 */
	public function getAllRecords() { 
       	$row = null;
		
		$sql = "SELECT s.stream_id, s.stream_name, s.stream_image, i.instructor_name 
                		FROM streams s, instructors i, stream_instructor si
						WHERE 
						s.stream_id=si.stream_id AND si.instructor_id=i.instructor_id					
						";
						 
		$this->_result = $this->_mysqli->query($sql);
       
		if (!$this->_result) {
			die('There was an error running the query [' . $this->_mysqli->error . ']');
		}
		if ($this->_result->num_rows < 1) {
			var_dump('In here');
			return false;
		}
		else {
			while ($row = $this->_result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
	}
}