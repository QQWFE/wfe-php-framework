<?php
/**
*@author liuxulei
*2014-12-1
*/

class Database_Connection {
	
	public $database;
	
	public static $_instance;
	
	public function __construct(){
	    $this->get_connection();
	}
	
	public function get_connection(){
	    
		$config = Config::get_config_array();
		$this->database = new PDO(
		    'mysql:host='.$config->db_host.';dbname='.$config->db_name.';charset='.$config->db_charset,
		    $config->db_user,
		    $config->db_pass,
		    array(PDO::ATTR_PERSISTENT => true)
		);
		return $this->database;
	}

	public static function get_instance(){
		if(null === self::$_instance){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
