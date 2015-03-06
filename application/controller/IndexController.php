<?php

class IndexController extends Controller_Action{

	public function index(){
// 		echo 'index';
		
		var_dump(ini_get('display_errors'));
		
		$config = Config::get_config_array();
// 		var_dump($config);

		$this->view();
	}

	public function show(){
		
	    $data = array(
	        'title' => 'WFE-PHP-FRAMEWORK',
	        'content' => '2015年发布，敬请期待',
	    );
		$this->view($data);
	}

	public function test_db(){
		//var_dump($this->application->config);exit;
		//$config_object = new Config();
		
// 		$db = new DB_Connector();
// 		$c = $db->get_connection();
// 		$r = $c->exec("INSERT INTO test SET name = 'aaa'");
	}
}
