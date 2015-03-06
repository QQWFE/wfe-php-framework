<?php

/**
*@author liuxulei
*2014-11-25
*/


class Application_FrontController extends Application_ApplicationAbstract{
	
	public function dispatcher(){
	    $uri_base = new Uri_Base($this->application);
	    $uri_base->analyze();
	    
	    $this->application->set_controller($uri_base->controller);
	    $this->application->set_action($uri_base->action);

		include ROOT_PATH.'/core/Controller/Action.php';
		$controller_name = $this->application->get_controller().'Controller';
		$controller_object = new $controller_name($this->application);

		$controller_object->dispatcher($this->application->get_action());
	}
}
