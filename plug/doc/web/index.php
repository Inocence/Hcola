<?php

header('content-type:text/html;charset=utf-8');

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<')) { die('require PHP > 5.3.0 !');}

define('APP_PATH','./');// 定义应用目录

define('RUNTIME_PATH','./Runtime/');//重定义Runtime位置

define('APP_DEBUG',true);// 开启调试模式 

require './System/ThinkPHP.php';



