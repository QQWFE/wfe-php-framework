<?php

/**
*@author liuxulei
*2014-11-26
*/

class Application_ApplicationAbstract {
	
	public $application;

	public function __construct(Application $application){
		
		$this->application = $application;
	}

	public function set_config(){
	
	}

	public function get_config(){
		
	}
}
