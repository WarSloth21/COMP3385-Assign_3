<?php

class SessionManager 
{
	protected $access =['profile'=>['testuser@comp3170.com']];

	public static function create ()
	{
		session_start();
		$array = array('container' => 'yes',);
	}
	
	public function destroy ()
	{
		$_SESSION = array ();   //Unsets all Session Variables
		
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '' , time() -4200,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
				);
		}
		session_destroy();
		header('Location:index.php');
	}
	
	public function add($name, $value)
	{
		//Check if Variable Name is Valid
		if (preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name) == 0)
		{
			trigger_error('Invalid Variable Name Used', E_USER_ERROR);
		}
		$_SESSION[$name] = $value;
	}
	
	public function see($name)
	{
		if (isset($_SESSION[$name]))
		{
			return $_SESSION[$name];
		}
		return null;
	}

	public function accessible($user, $page)
	{
		if (in_array($user, $this->access[$page]))
		{
			return true;
		}
		return false;
	}

	public function remove(string $name)
	{
		if (isset($_SESSION[$name]))
		{
			unset($_SESSION[$name]);
		}
	}
}