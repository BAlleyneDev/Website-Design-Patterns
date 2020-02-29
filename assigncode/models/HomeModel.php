<?php

class HomeModel implements ModelSelectInterface{
	
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
		
		$sql = "SELECT c.course_name, c.course_image, i.instructor_name
						FROM courses c, instructors i, course_instructor ci
						WHERE c.course_id=ci.course_id and
							  i.instructor_id=ci.instructor_id
							  order by c.course_access_count desc
							  limit 8";
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
			$data1[] = $row;
		}
		
		
		$sql = "SELECT c.course_name, c.course_image, i.instructor_name
						FROM courses c, instructors i, course_instructor ci
						WHERE c.course_id=ci.course_id and
							  i.instructor_id=ci.instructor_id
							  order by c.course_recommendation_count desc
							  limit 8";
		$this->_result = $this->_mysqli->query($sql);
       
		if (!$this->_result) {
			die('There was an error running the query [' . $this->_mysqli->error . ']');
		}
		if ($this->_result->num_rows < 1) {
			var_dump('In here secondly');
			return false;
		}
		else {
			while ($row = $this->_result->fetch_assoc()) {
			$data2[] = $row;
		}
		
		$data3=array($data1,$data2);
		
		return $data3;
		}
	}
	}
}