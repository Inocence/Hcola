<?php
//======================================================================
//|后台 日志管理控制器
//======================================================================
//|Author：XQ<xq@moziyi.com>
//|Time：2016-11-11 16:24:49
//======================================================================
namespace Index\Action;

use Think\Action;


Class CommonAction extends Action
{
    public function _initialize() {
        $this->loginCheck();
    }

    public function loginCheck() {
        $user_id = session('user.id');
        if(empty($user_id)) {
            $this->redirect('Index/Login/login');
        }
    }
}

?>