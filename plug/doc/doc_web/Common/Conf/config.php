<?php
$config=array(
	'APP_STATUS' => 'debug',
	// 'SHOW_PAGE_TRACE' => true,

	'WEB_KEY'=>'e6e10aa303df8a0f11ca122343b956bb',//web钥匙
	
	'LOAD_EXT_CONFIG' => 'parameter',
	'LOAD_EXT_FILE'=>'',
	  
	'DEFAULT_C_LAYER'       =>  'Action', // 控制器层名称
	'DEFAULT_MODULE' => 'Index',//默认分组
	'MODULE_ALLOW_LIST' => array('Index'),


	'TOKEN_ON'=>true,  // 是否开启令牌验证
	'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true



	/*路由配置*/
	'URL_MODEL' => 2, 
	'TMPL_FILE_DEPR' => '_',
);


return array_merge(
	include './Data/db_config.php',
	include './Data/system.php',
	$config
);