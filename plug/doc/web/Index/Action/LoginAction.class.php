<?php
//======================================================================
//|后台 日志管理控制器
//======================================================================
//|Author：XQ<xq@moziyi.com>
//|Time：2016-11-11 16:24:49
//======================================================================
namespace Index\Action;

use Think\Action;


Class LoginAction extends Action
{
    public function login()
    {
        if (IS_POST) {
            $username = I('post.username', '');
            $password = I('post.password', '');
            $user = M('User');
            $user_one = $user->where(['username' => $username, 'password' => md5($password)])->find();
            if (!$user_one) {
                $this->error('账号或密码错误');
            }
            session('user.id', $user_one['id']);
            session('user.username', $user_one['username']);
            session('user.auth', $user_one['auth']);
            $this->redirect('Index/Index/index');
        } else {
            $user_id = session('user.id');
            if(!empty($user_id)) {
                $this->redirect('Index/Index/index');
            } else {
                $this->display();
            }
        }
    }

    public function logout()
    {
        if (session('user.id')) {
            session('user', null);
            $this->redirect('Index/Login/login');
        }
    }
}

?>