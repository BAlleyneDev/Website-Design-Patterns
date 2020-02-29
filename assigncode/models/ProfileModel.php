<?php

class ProfileModel implements ModelSelectInterface{
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
	
	public function getAllRecords() { 
	$row = null;
	$user = Member::getUserSingleton();
	$email = $user->getId();
	$sql="SELECT c.course_id, c.course_name, c.course_image, i.instructor_name, fd.faculty_dept_name 
                		FROM courses c, course_instructor ci, faculty_dept_courses fc, instructors i, faculty_department fd, user_courses uc
						WHERE ci.course_id = c.course_id and 
						   i.instructor_id = ci.instructor_id and
						fd.faculty_dept_id = fc.faculty_dept_id and
						   c.course_id = fc.course_id and 
						   uc.email = '$email' and 
						   uc.course_id = c.course_id";
	
	$this->_result = $this->_mysqli->query($sql);
       
		if (!$this->_result) {
			die('There was an error running the query [' . $this->_mysqli->error . ']');
		}
		if ($this->_result->num_rows < 1) {
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