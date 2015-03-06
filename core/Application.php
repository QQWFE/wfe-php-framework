<?php

class Application {

	public $config;
	
	public $controller;
	
	public $action;

	public function __construct($config){
	    
	    $this->_registry_autoloader();
	    
		$this->set_config($config);
		Config::getInstance($this->config);
		
		$this->_set_debug();
	}
	
	/**
	 * Registry Autoloader
	 */
	private function _registry_autoloader(){
	    
	    require_once ROOT_PATH.'/core/Loader/AutoLoader.php';
	    $autoLoader = Loader_AutoLoader::getInstance();
	}

	public function run(){
		
		$frontController = new Application_FrontController($this);
		$frontController->dispatcher();
	}
	
	/**
	 * Set Debug Model
	 */
	private function _set_debug(){
	    
	    $debug = Config::get_config_value('debug');
	    
	    if($debug == true){
    	    error_reporting(E_ALL);
    	    ini_set('display_errors', 1);
	    }else{
	        error_reporting(0);
	        ini_set('display_errors', 0);
	    }
	}

	/**
	 * set config var
	 * @param Object or Array $config
	 */
	public function set_config($config){
	    if(is_array($config)){
	        //array to object
	        $this->config = (object)$config;
	    }else{
    		$this->config = $config;
	    }
	}

	public static function get_config(){
		return Config::get_config_array();
	}
	
	public static function get_config_var($config_var){
	    
	    return Config::get_config_value($config_var);
	}
	
	public function set_controller($controller){
	    $this->controller = $controller;
	}
	
	public function get_controller(){
	    return $this->controller;
	}
	
	public function set_action($action){
	    $this->action = $action;
	}
	
	public function get_action(){
	    return $this->action;
	}
}
