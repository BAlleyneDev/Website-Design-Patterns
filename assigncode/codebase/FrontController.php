<?php
class FrontController implements FrontControllerInterface
{
	public function init()
	{
		Session::startSession();
		if (isset($_GET['reset']))
		{
			Session::endSession();
			header('Location:index.php');
		}
	
      $controller = PageControllerFactory::makePageController('Login');
	  $user = Coordinator::getUserSingleton();
	  $validator = Validator::makeValidatorSingleton();
	  
	  if($user->isIdSet()){
		  if (!isset($_GET['controller'])) //logged in but didnt specify a controller value
		  {
			  header('Location: index.php?controller=Home');
		  }
		  
		  if(isset($_GET['controller']) && !$validator->isPageNameValid($_GET['controller']))
		  {
			  $controller = PageControllerFactory::makePageController($_GET['controller']);
		  }
	  }
	  
	  if (!$user->isIdSet()){
		  if(!isset($_GET['controller']))
		  {
			  header('Location: index.php?controller=Login');
		  }
		  
		  if(isset($_GET['controller']) && !$validator->isPageNameValid($_GET['controller']))
		  {
			  $controller = PageControllerFactory::makePageController($_GET['controller']);
		  }
		  

	  }
	  
	  $controller->run();
	}
}
