<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/xq.css">
    <script type="text/javascript" src='/Public/JQuery/jquery-1.7.2.min.js'></script>
</head>

<style type="text/css">
    .param input {
        width: 200px
    }

    .param {
        margin: 5px 0px
    }

    .radio {
        width: auto;
        height: auto
    }

    .param a {
        padding: 3px;
        text-align: center;
        border: 1px solid #ccc;
        margin: 0px 2px;
        cursor: pointer;
    }

    label {
        cursor: pointer;
    }
</style>


<body>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo ($value["id"]); ?>"/>
    <input type="hidden" name="pid" value="<?php echo ($value["pid"]); ?>"/>
    <table>
        <tr>
            <th>名称</th>
            <td><input type="text" name="title" value="<?php echo ($value["title"]); ?>"/></td>
        </tr>

        <tr>
            <th>排序</th>
            <td><input type="text" name="sort" value="<?php echo ((isset($value["sort"]) && ($value["sort"] !== ""))?($value["sort"]):'100'); ?>"/></td>
        </tr>


        <tr>
            <th>接口介绍</th>
            <td>
                <textarea name="syno" style="height: 100px"><?php echo ((isset($value["syno"]) && ($value["syno"] !== ""))?($value["syno"]):''); ?></textarea>
            </td>
        </tr>


        <tr>
            <th>请求地址</th>
            <td><input type="text" name="url" value="<?php echo ((isset($value["url"]) && ($value["url"] !== ""))?($value["url"]):'http://edu.dev.jxjt.me/'); ?>"/></td>
        </tr>

        <tr>
            <th>请求方式</th>
            <td>
                <label>GET<input type="radio" name="type" class="radio" value="1"/></label>
                <label>POST<input type="radio" name="type" class="radio" value="2" checked/></label>

            </td>
        </tr>

        <script type="text/javascript">
            $(function () {
                $('input[name=type][value=<?php echo ($value["type"]); ?>]').attr("checked", "checked");
            })
        </script>

        <tr>
            <th>GET参数</th>
            <td class="get" data='1000'>
                <?php if(empty($value["get"])): ?><div class="param"><input type="text" name="get[1][key]"/><input type="text"
                                                                                     name="get[1][value]"/><input
                            type="text" name="get[1]['note']"/><a onclick="add('get')">+</a></div>
                    <?php else: ?>
                    <?php if(is_array($value["get"])): foreach($value["get"] as $k=>$get): ?><div class="param"><input type="text" name="get[<?php echo ($k); ?>][key]" value="<?php echo ($get["key"]); ?>"/><input
                                type="text" name="get[<?php echo ($k); ?>][value]" value="<?php echo ($get["value"]); ?>"/><input type="text"
                                                                                                 name="get[<?php echo ($k); ?>][note]"
                                                                                                 value="<?php echo ($get["note"]); ?>"/>

                            <a onclick="add('get')">+</a>
                            <?php if($k != 0): ?><a onclick="move(this)">-</a><?php endif; ?>
                        </div><?php endforeach; endif; endif; ?>
            </td>
        </tr>


        <tr>
            <th>POST参数</th>
            <td class="post" data='1000'>
                <?php if(empty($value["post"])): ?><div class="param"><input type="text" name="post[1][key]"/><input type="text"
                                                                                      name="post[1][value]"/><input
                            type="text" name="post[1][note]"/><a onclick="add('post')">+</a></div>
                    <?php else: ?>
                    <?php if(is_array($value["post"])): foreach($value["post"] as $k=>$post): ?><div class="param"><input type="text" name="post[<?php echo ($k); ?>][key]" value="<?php echo ($post["key"]); ?>"/><input
                                type="text" name="post[<?php echo ($k); ?>][value]" value="<?php echo ($post["value"]); ?>"/><input type="text"
                                                                                                   name="post[<?php echo ($k); ?>][note]"
                                                                                                   value="<?php echo ($post["note"]); ?>"/>

                            <a onclick="add('post')">+</a>
                            <?php if($k != 0): ?><a onclick="move(this)">-</a><?php endif; ?>
                        </div><?php endforeach; endif; endif; ?>
            </td>
        </tr>

        <tr>
            <th>POST参数详解</th>
            <td><textarea name="param" class="content" style="height: 150px"><?php echo ($value["param"]); ?></textarea></td>
        </tr>

        <tr>
            <th>返回参数</th>
            <td><textarea name="return" class="content"><?php echo ($value["return"]); ?></textarea></td>
        </tr>

        <tr>
            <th>返回例子</th>
            <td><textarea name="result" class="content"><?php echo ($value["result"]); ?></textarea></td>
        </tr>

        <tr>
            <th></th>
            <td><input type="submit" class="submit" value="提交"/></td>
        </tr>


    </table>
</form>
</body>
</html>


<script type="text/javascript">

    function move(self) {
        $(self).parent().remove();
    }

    function add(idclass, self) {
        var _type = idclass;
        var idclass = '.' + idclass;

        var number = $(idclass).attr('data');
        var html = '<div class="param"><input type="text" name="' + _type + '[' + number + '][key]"/><input type="text" name="' + _type + '[' + number + '][value]"/><input type="text" name="' + _type + '[' + number + '][note]"/><a onclick="add(\'' + _type + '\')">+</a><a onclick="move(this)">-</a></div>';
        $(idclass).append(html);
        $(idclass).attr('data', number * 1 + 1);
    }

</script>


<script src="/Public/Kindeditor/kindeditor.js"></script>
<script src="/Public/Kindeditor/lang/zh_CN.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Kindeditor/themes/default/default.css">
<script type="text/javascript">
    KindEditor.ready(function (K) {
        var editor = K.editor({
            allowFileManager: true
        });
    });

    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('.content', {
            allowFileManager: true,
            afterBlur: function () {
                this.sync();
            }
        });
    });


</script>