<?php
//======================================================================
//|后台 日志管理控制器
//======================================================================
//|Author：XQ<xq@moziyi.com>
//|Time：2016-11-11 16:24:49
//======================================================================
namespace Index\Action;

class IndexAction extends CommonAction
{

    public function index()
    {
        $cate = M('cate')->where(array('pid' => 0))->order('sort asc,id asc')->select();

        foreach ($cate as $key => $value) {
            $cate[$key]['child'] = M('cate')->where(array('pid' => $value['id']))->order('sort asc,id asc')->select();
        }

        $this->cate = $cate;

        if (!I('get.id')) {
            $id = M('cate')->where(['pid' => ['neq', 0]])->order('id asc')->getField('id');
            if ($id) $this->redirect('index/index/index', array('id' => $id));
        }

        $api = M('cate')->where(array('id' => I('get.id')))->find();
        $api['get'] = json_decode($api['get'], true);
        $api['post'] = json_decode($api['post'], true);
        $this->api = $api;
        $this->username = session('user.username');
        if(session('user.auth')) {
            $this->auth = session('user.auth');
        }

        $this->display();
    }

}

?>