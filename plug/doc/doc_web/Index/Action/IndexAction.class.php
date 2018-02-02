<?php
//======================================================================
//|后台 日志管理控制器
//======================================================================
//|Author：XQ<xq@moziyi.com>
//|Time：2016-11-11 16:24:49
//======================================================================
namespace Index\Action;
use Think\Action;
Class IndexAction extends Action {

//+————————————————————————————————————————
//|调试日志页面
//+————————————————————————————————————————
Public function index () {
	

	if (I('get.key')=='QHc0Pzww1LIDFeO3') 
	{
		session('key','QHc0Pzww1LIDFeO3');
	}

	if (session('key')!='QHc0Pzww1LIDFeO3') {
		echo '参数错误';die();
	}


	if (I('get.k')=='513022') {
		cookie('k','513022');
	}

	$this->k=cookie('k');


	$cate=M('cate')->where(array('pid'=>0))->order('sort asc,id asc')->select();

	foreach ($cate as $key => $value) {
		$cate[$key]['child']=M('cate')->where(array('pid'=>$value['id']))->order('sort asc,id asc')->select();
	}

	$this->cate=$cate; 


	if (!I('get.id')) 
	{
		$id=M('cate')->order('id asc')->getField('id');
		if ($id)  $this->redirect('index/index/index',array('id'=>$id));
	}else{
		$this->prew=M('cate')->where('id < '.I('get.id'))->order('id desc')->find();//上一个
		$this->next=M('cate')->where('id >'.I('get.id'))->order('id asc')->find();//下一个
	}


	/*接口内容*/
	$api=M('cate')->where(array('id'=>I('get.id')))->find();
	$api['get']=json_decode($api['get'],true);
	$api['post']=json_decode($api['post'],true);
	$this->api=$api;

	$this->get=I('get.');



	$this->display(); 
}




}?>