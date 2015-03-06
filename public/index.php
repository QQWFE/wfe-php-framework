<?php
//@alvinxlliu
//2014-11-23

//初始化全局变量
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
define('CORE_PATH', ROOT_PATH.DS.'core');
define('CONTROLLER_PATH', ROOT_PATH.'/application/controller');

//加载配置文件
define('CONFIG_FILE', ROOT_PATH.'/application/configs/config.php');
require_once CONFIG_FILE;

//载入Application.php
require_once ROOT_PATH.'/core/Application.php';

//实现mvc
$application = new Application($config);
$application->run();
