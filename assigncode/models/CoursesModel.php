<?php

class CoursesModel implements ModelSelectInterface, ModelInsertInterface{
	private	$_errors = null;
	private	$_result = null;
	private	$_data = array();
	private $_mysqli = null;
		
	use TraitDatabaseConnector;
	
	public function getOneRecord(array $identifiers){

	}
	
	public function getNumRecords($email){
		$sql = 'SELECT * FROM user_courses WHERE email="'.$email.'"';
				
		$this->_result = $this->_mysqli->query($sql);
		return($this->_result->num_rows);
	}
	
	public function newRecord(array $recordInfo){
	
		$email=$recordInfo[1];
		$course_id=$recordInfo[0]['id'];
		
		$sql = 'INSERT INTO user_courses VALUES ("'.$email.'",'.$course_id.')';
				
		$this->_result = $this->_mysqli->query($sql);
	}


	/**
	 * Retrieve all records from a table
	 */
	public function getAllRecords() { 
       	$row = null;
		
		$sql = "SELECT DISTINCT c.course_id, c.course_name, c.course_image, i.instructor_name, fd.faculty_dept_name 
                		FROM courses c, course_instructor ci, faculty_dept_courses fc, instructors i, faculty_department fd
						WHERE ci.course_id = c.course_id and 
						   i.instructor_id = ci.instructor_id and
						fd.faculty_dept_id = fc.faculty_dept_id and
						   c.course_id = fc.course_id
						 ORDER BY c.course_name
						 LIMIT 25";
						 
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