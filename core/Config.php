<?php

/**
*@author liuxulei
*2014-12-1
*/

class Config {
	
	public $config_file;

	public static $_config;

	public static $_instance;

	public function __construct($config){
		
		self::$_config = $config;
	}
	
	/**
	 * get one config value
	 * if no config value, return false
	 * @param String $value
	 */
	public static function get_config_value($value){
	    if(!isset(self::$_config->$value)){
	        return false;
	    }else{
    	    return self::$_config->$value;
	    }
	}

	public static function get_config_array(){
	    return self::$_config;
	}

	/**
	 * for instance
	 * @param Array $config
	 * @return Config
	 */
	public static function getInstance($config){
	    
		if(null === self::$_instance){
			self::$_instance = new self($config);
		}

		return self::$_instance;
	}
}
