<?php
/**
*@author liuxulei
*2014-11-26
*/

class Loader_AutoLoader{
	
	protected static $_instance;

	public function __construct(){
		spl_autoload_register(array(__CLASS__, 'autoload'));	
	}

	public static function autoload($class){

		$class_path_array = explode('_', $class);
		$require_path = '';
		foreach($class_path_array as $key => $value){
			$require_path = $require_path.DS.$value;
		}

		$real_require_path = CORE_PATH.$require_path.'.php';
		if(!is_file($real_require_path)){
			$real_require_path = CONTROLLER_PATH.$require_path.'.php';
		}
		require_once $real_require_path;
	}

	public static function getInstance(){
		if(null === self::$_instance){
			self::$_instance = new self();
		}

		return self::$_instance;
	}
}
