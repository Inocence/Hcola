<?php
return array(
	//开启页面布局
	'LAYOUT_ON'=>true,
	'LAYOUT_NAME'=>'public',
		
	'TMPL_PARSE_STRING' => array(
		'__IMG__'    => __ROOT__ . '/' . MODULE_NAME . '/Static/Images', //图片目录
		'__CSS__'    => __ROOT__ . '/' . MODULE_NAME . '/Static/Css', //CSS目录
		'__JS__'     => __ROOT__ . '/' . MODULE_NAME . '/Static/Js', //JS目录
	),

);