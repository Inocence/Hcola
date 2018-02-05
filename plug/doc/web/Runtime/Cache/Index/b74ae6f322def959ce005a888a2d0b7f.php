<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>API开发文档</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="/Index/Static/Css/kancloud.min.css">
    <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/style.min.css">
    <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/bootstrap.min.css">
    <link charset="utf-8" rel="stylesheet" href="/Index/Static/Js/bootstrap.min.js">
    <!-- <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/tomorrow.css"> -->
    <!-- <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/jquery.atwho.min.css"> -->
    <!-- <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/hint.min.css"> -->
    <!-- <link rel="stylesheet" href="/Index/Static/Css/style.css"> -->
    <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/xq.css">
</head>

<body>
<div class="container">
    <div style="margin-top: 20px">
        <a class="btn btn-success" href="javascript:pop('添加用户','<?php echo U('User/add');?>');">添加用户</a>
        <a class="btn btn-default" href="<?php echo U('Index/index');?>">返回首页</a>
    </div>

    <table align="center" class="table table-bordered" style="margin-top: 20px">
        <thead>
        <th>ID</th>
        <th>用户名</th>
        <th>权限</th>
        <th>操作</th>
        </thead>
        <tbody>
        <?php if(is_array($user_list)): foreach($user_list as $key=>$list): ?><tr>
                <td><?php echo ($list["id"]); ?></td>
                <td><?php echo ($list["username"]); ?></td>
                <td>
                    <?php if($list["auth"] == 0): ?>可读
                        <?php else: ?>
                        可读可写<?php endif; ?>
                </td>
                <td>
                    <a href="javascript:pop('添加用户','edit/id/<?php echo ($list["id"]); ?>');">编辑</a>
                    <a href="delete/id/<?php echo ($list["id"]); ?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript" src="/Public/JQuery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/Public/Layer/layer.js"></script>
<script type="text/javascript">
    function  pop(title,url){
        layer.open({
            type: 2,
            title:title,
            area: ['35%', '40%'],
            fixed: false, //不固定
            maxmin: false,
            closeBtn:2,
            content:url,
        });
    }

    function url(url){
        window.location.href=url;
    }
</script>