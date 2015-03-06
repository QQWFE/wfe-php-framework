<?php
/**
 * @author liuxulei
 * 2015-2-13
 */

class Uri_Base {
    
    public $url_model;
    
    public $controller;
    
    public $action;
    
    const NORMAL_MODEL = 'normal';
    const REWRITE_MODEL = 'rewrite';
    
    public function __construct(Application $application){
        
        $this->url_model = Application::get_config_var('url_model');
    }
    
    public function analyze(){
        switch ($this->url_model){
            case self::REWRITE_MODEL:
                $request_uri = $_SERVER['REQUEST_URI'];
                $request_uri_array = explode('/', $request_uri);
                $this->controller = (isset($request_uri_array[1]) && $request_uri_array[1] != '') ? $request_uri_array[1] : Application::get_config_var('default_controller');
                $this->action = (isset($request_uri_array[2]) && $request_uri_array[2] != '') ? $request_uri_array[2] : Application::get_config_var('default_action');
                break;
            default:
                $this->controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : Application::get_config_var('default_controller');
                $this->action = isset($_REQUEST['a']) ? $_REQUEST['a'] : Application::get_config_var('default_action');
        }
        return false;
    }
}