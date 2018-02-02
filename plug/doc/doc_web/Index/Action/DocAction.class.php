<?php
//======================================================================
//|后台 日志管理控制器
//======================================================================
//|Author：XQ<xq@moziyi.com>
//|Time：2016-11-11 16:24:49
//======================================================================
namespace Index\Action;
use Think\Action;
Class DocAction extends Action {

//+————————————————————————————————————————
//|调试日志页面
//+————————————————————————————————————————
Public function cate () {

	if (IS_POST) {
		$data=I('post.');

		foreach ($data['get'] as $key => $value) {
			if ($value['value']) {
				$get[]= $value;
			}
		}

		

		if ($data['type']==1) 
		{
			$post='';
		}else{
			foreach ($data['post'] as $key => $value) {
				if ($value['value']) {
					$post[]= $value;
				}
			}
		}

		$data['get']=$get?json_encode($get):'';
		$data['post']=$post?json_encode($post):'';
	
		if (!I('post.id')) {
			$data['pid']=$data['pid']?:0;
			$state=M('cate')->data($data)->add();
			$msg='添加';
		}else{
			$state=M('cate')->save($data);
			$msg='修改';
		}

		
		if ($state) {
			$this->success($msg.'成功');
		}else{
			$this->error($msg.'失败');
		}
	}else{


		if (I('get.id')) {
			$value=M('cate')->where(array('id'=>I('get.id')))->find();
			$value['get']=json_decode($value['get'],true);
			$value['post']=json_decode($value['post'],true);
			$this->value=$value;
		}

		if (I('get.pid')) {
			$this->value=I('get.');
			 
		}

		$this->display(); 

		
	}
}


Public function test()
{

	$api=M('cate')->where(['id'=>I('get.id','','intval')])->find();

	foreach (json_decode($api['post'],true) as $key => $value) {
		$post[$value['key']]=$value['value'];
	}
	$api['post']=json_encode($post);


	foreach (json_decode($api['get'],true) as $key => $value) {
		$get[$value['key']]=$value['value'];
	}
	

	function ToUrlParams($urlObj)
	{
	    $buff = "";
	    foreach ($urlObj as $k => $v)
	    {
	        if($k != "sign"){
	            $buff .= $k . "=" . $v . "&";
	        }
	    }
	    
	    $buff = trim($buff, "&");
	    return $buff;
	}

	$api['get']=$api['get']?ToUrlParams($get):'';

	$this->value=$api;

	$this->display(); 
}

Public function dotest(){
	function curl_get($url,$post) { 
	    $curl = curl_init();//初始化curl模块 
	    curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址 
	    curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息 
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//是否自动显示返回的信息 

	    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交 
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
	    curl_exec($curl);//执行cURL 
	    curl_close($curl);//关闭cURL资源，并且释放系统资源 
	} 



	//设置post的数据 
	$post =json_decode($_POST['post'],true);

	
	if ($_POST['get']) {
		$url=$_POST['url'].'?'.$_POST['get'];
	}else{
		$url=$_POST['url'];
	}

	echo "请求地址<br/><br/>";

	echo $url.'<br/><br/>';

	echo "请求参数<br/><br/>";

	P($post);

	echo '<br/><br/>';

	echo "返回参数<br/><br/>";
	curl_get($url,$post);


}


}?>