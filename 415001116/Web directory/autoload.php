<?php 

spl_autoload_register(function($class) {
	$arr = explode("\\", $class);
	$classname = $arr[count($arr)-1];

	/**
	 * if (!defined('APP_DIR')) {
			define ("ROOT_DIR", 'C:\xampp2\htdocs\COMP 3385\415001116');
			define ("APP_DIR", ROOT_DIR . "\app");
			define ("FRAMEWORK_DIR", ROOT_DIR . '\framework');
			define ('TPL_DIR', ROOT_DIR . '\tpl');
			define ('DATA_DIR', ROOT_DIR . '\data');
		}
	 */
	
	if (file_exists(APP_DIR . "/" . $classname . '.php')) {
		require APP_DIR . '/' .$classname . '.php';
	}
	else if (file_exists(FRAMEWORKS_DIR . "/" . $classname . '.php')) {
		require FRAMEWORKS_DIR . "/" .$classname . '.php';
	}
	else if (file_exists(TPL_DIR . '/' . $classname . '.php')) {
		require TPL_DIR . '/' .$$classname . '.php';
	}
	else if (file_exists(DATA_DIR . '/' . $classname . '.php')) {
		require DATA_DIR . '/' .$classname . '.php';
	}/*
	else {
		trigger_error('Cannot find class/interface/abstract definition: ' .$class, E_USER_ERROR);
	}*/
});