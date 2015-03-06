<?php
/**
*@author liuxulei
*2014-11-26
*/

class Controller_Action {

	public $application;
	
	public $view_data;
	
	/**
	 * Construct Application var
	 * @param Application $application
	 */
	public function __construct(Application $application){
		$this->application = $application;
	}

	public function dispatcher($action){
		
		$this->$action();
	}
	
	/**
	 * run view
	 * @param Array $view_data
	 */
	public function view($view_data = array()){
	    $this->_init_base_view_data();
	    $this->view_data = array_merge($this->view_data, $view_data);
	    extract($this->view_data);
	    
        include ROOT_PATH.'/application/view/'.$this->application->get_controller().'/'.$this->application->get_action().'.php';
	}
	
	private function _init_base_view_data(){
	    
	    $base_var = $this->application->get_config()->base_view;
	    $this->view_data = $base_var;
	}
	
	public function get_var($key = null, $xss_clean = false, $default=null){
	    return Request_Param::get($key, $default, $xss_clean);
	}
	
	public function post_var($key = null, $xss_clean = false, $default=null){
	    return Request_Param::post($key, $default, $xss_clean);
	}
	
	public function request_var($key=null, $xss_clean=false, $default=null){
	    return Request_Param::request($key, $default, $xss_clean);
	}
	
	public function table($table_name){
	    
	    return new Table($table_name);
	}
	
	public function redirect($url){
	    header('Location:'.$url);
	}
	
	public function ajax($data, $code=1){
		
		header('content-type:application/json;charset=utf8');
		$array = array(
			'data' => $data,
			'code' => $code,
		);
		echo json_encode($array);exit;
	}
	
	public function url($controller, $action, $data=array()){
		switch ($this->application->get_config()->url_model){
			case 'rewrite':
			$url = '/'.$controller.'/'.$action;
			if(!empty($data)){
				foreach($data as $key => $value){
					$url = $url.'/'.$key.'/'.$value;
				}
			}
				return $url;
				break;
			case 'normal':
			$url = '/index.php?c='.$controller.'&a='.$action;
			foreach($data as $key => $value){
				$url = $url.'&'.$key.'='.$value;
			}
				return $url;
				break;
			default:
				return '/'.$controller.'/'.$action;
		}
	}
}
