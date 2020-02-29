<?php

class UnenrollConfirmedModel implements ModelInsertInterface{
	
	private	$_errors = null;
	private	$_result = null;
	private	$_data = array();
	private $_mysqli = null;
		
	use TraitDatabaseConnector;
	
	function newRecord(array $recordInfo){
		$row = null;
		$user = Member::getUserSingleton();
		$email=$user->getId();
		$sql='DELETE FROM user_courses 
		      WHERE email="'.$email.'" AND course_id='.$recordInfo['id'].' ';
		$this->_result = $this->_mysqli->query($sql);
		
		if (!$this->_result) {
			die('There was an error running the query [' . $this->_mysqli->error . ']');
		}
	}
}