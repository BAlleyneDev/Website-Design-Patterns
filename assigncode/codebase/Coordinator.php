<?php

class Coordinator extends UserAbstract //implementing user object
{
	protected $_userdata = array('email'=>'', 'password'=>'');
	
	
	public static function getUserSingleton(){
		if(Session::read('Coordinator') == null)
		{
			self::$_instance = new Coordinator();
			Session::write('Coordinator', self::$_instance);
		}
		return Session::read('Coordinator');
	}
	
	public function init(array $input)
	{
		$model = new CoordinatorModel();
		
		if (($user_record = $model -> getOneRecord($input)) !== false) //return 1 record or false user entered invalid info
		{
			$user_record = $model -> getOneRecord($input);
			//var_dump($user_record);
			parent::_setId($user_record['email']);
			/*parent::setData(array('email'=>$user_record['email'],
			                      'password' => $user_record['password']));*/
		}
	}
	
	
	
	//session management to create singleton that persists
}