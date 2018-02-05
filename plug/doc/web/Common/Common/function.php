<?php
//======================================================================
//|公用函数文件
//======================================================================


//+————————————————————————————————————————
//|验证图片验证码
//+————————————————————————————————————————
function check_verify($code, $id = ''){
   $verify = new \Think\Verify();
   $verify=$verify->check($code, $id);
   return  $verify;
}

//+————————————————————————————————————————
//|打印函数
//+————————————————————————————————————————
function P($var,$die=0){
	echo "<pre>";
		var_dump($var);
	echo "</pre>";

	if ($die==1) {
		die();
	}
}

function xq_exp($start,$end,$str)
{
	$t1=explode($start, $str);

	$t2=explode($end, $t1[1]);

	return $t2[0];
}

//+————————————————————————————————————————
//|打印sql
//+————————————————————————————————————————
function sql($die=0){
	echo M()->GETLASTSQL();
	if ($die==1) {
		die();
	}
}


//+————————————————————————————————————————
//|去掉空格函数
//+————————————————————————————————————————
function trimall($str){    
	$qian=array(" ","　","\t","\n","\r");
	$hou=array("","","","","");    
	return str_replace($qian,$hou,$str);    
}

	
//+————————————————————————————————————————
//|将序列转数组函数
//+————————————————————————————————————————
function arrserialize($value){
	$te=explode("&",$value);
	foreach ($te as $key =>$value) {
		$t2=explode("=",$value);
		$arr[$t2['0']]=$t2['1'];
	}
	return $arr;
}

//+————————————————————————————————————————
//|密码加密
//+————————————————————————————————————————
function md5_cms($value){
	$value=md5(C('WEB_KEY').md5($value));
	return $value;
}



//+————————————————————————————————————————
//|搜索替换
//+————————————————————————————————————————
function replace_search($str){
	return str_replace(I('get.keyword'),"<font color='red'>".I('get.keyword')."</font>",$str);
}
