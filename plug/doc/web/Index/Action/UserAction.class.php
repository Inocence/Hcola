<?php
//======================================================================
//|后台 日志管理控制器
//======================================================================
//|Author：XQ<xq@moziyi.com>
//|Time：2016-11-11 16:24:49
//======================================================================
namespace Index\Action;

class UserAction extends CommonAction
{

    public function index()
    {
        $list = M('User')->order('id desc')->select();
        $this->user_list = $list;
        $this->display();
    }

    public function add() {
        if(IS_POST) {
            $post = I('post.');
            if(empty($post['username']) || empty($post['password'])) {
                $this->error('参数错误');
            }
            $user = M('User')->where(['username' => $post['username']])->find();
            if($user) {
                $this->error('用户名已存在');
            }
            $password = md5($post['password']);
            $user = M('User');
            $user->add([
                'username' => $post['username'],
                'password' => $password,
                'auth' => $post['auth']
            ]);
            $this->success('添加成功');
        } else {
            $this->display();
        }
    }


    public function edit() {
        if(IS_POST) {
            $post = I('post.');
            $data = [
                'username' => $post['username'],
                'auth' => $post['auth']
            ];
            if(!empty($post['password'])) {
                $data['password'] = md5($post['password']);
            }
            $user = M('User');
            $user->find(I('get.id'));
            $user->where(['id' => I('get.id')])->save($data);
            $this->success('编辑成功');
        } else {
            $user = M('User');
            $this->user = $user->find(I('get.id'));
            $this->display();
        }
    }


    public function delete() {
        $user_id = I('get.id');
        $user = M('User');
        $user->find($user_id);
        $user->delete();
        $this->success('删除成功');
    }

}

?>