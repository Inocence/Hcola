<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>编辑用户信息</title>
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
    <form action="" method="post">
        <div class="form-group">
            <label for="username">用户名</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo ($user["username"]); ?>">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" name="password"  class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="auth">权限</label>
            <select class="form-control" id="auth" name="auth">
                <option value="0" <?php if($user["auth"] == 0): ?>selected="selected"<?php endif; ?> >可读</option>
                <option value="1" <?php if($user["auth"] == 1): ?>selected="selected"<?php endif; ?> >可读可写</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">确定</button>
    </form>
</div>
</body>