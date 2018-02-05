<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>用户登录</title>
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
<div class="input-group" style="width: 200px;height: 180px;margin: 100px auto" align="center">
    <form action="" id="login" method="post">
        <input name="username" type="text" class="form-control" placeholder="请输入用户名"/>
        <input name="password" type="password" class="form-control" placeholder="请输入密码"/>
        <button type="submit" class="btn btn-success">登录</button>
    </form>
</div>
</body>