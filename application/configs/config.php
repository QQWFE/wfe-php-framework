<?php
/**
*@author liuxulei
*2014-11-26
*/

$config = array(
    
    'debug' => true,
    
    //rewrite or normal
    //normal:/index.php?c=index&a=index
    //rewrite:/index/index
    'url_model' => 'rewrite',

	//默认的控制器配置
	'default_controller' => 'Index',
	'default_action' => 'show',

	//DB的相关信息配置
	'db_host' => '127.0.0.1',	
	'db_user' => 'root',	//数据库用户名
	'db_pass' => '',	//数据库密码
	'db_name' => 'wfe_framework',	//数据库名
	'db_charset' => 'utf8',
	
    'base_view' => array(
        'website_title' => 'WFE-PHP-FRAMEWORK',
    ),
	
	'tencent' => array(
		'app_id' => 'appID',
		'app_secret' => 'secret',
	),
);
