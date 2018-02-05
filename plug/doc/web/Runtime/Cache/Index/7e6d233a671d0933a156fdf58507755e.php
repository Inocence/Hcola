<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/xq.css">
</head>




<body>
	<form method="post" action="<?php echo U('Doc/dotest');?>">

		<table>
			<tr>
				<th>提交地址</th>
				<td><input type="text" name="url" value="<?php echo ($value["url"]); ?>" /></td>
			</tr>

			<tr>
				<th>GET参数</th>
				<td><input type="text" name="get" value="<?php echo ($value["get"]); ?>" /></td>
			</tr>


			<tr>
				<th>POST参数</th>
				<td>
					<textarea  style="width: 80%;height: 100px" name="post"><?php echo ($value["post"]); ?></textarea>
				</td>
			</tr>

			


			<tr>
				<th></th>
				<td><input type="submit"   class="submit" value="提交" /></td>
			</tr>


		</table>
	</form>
</body>
</html>


 <script src="/Public/kindeditor/kindeditor.js"></script>
  <script src="/Public/kindeditor/lang/zh_CN.js"></script>
  <link rel="stylesheet" type="text/css" href="/Public/kindeditor/themes/default/default.css">
<script type="text/javascript">
  KindEditor.ready(function(K) {
                var editor = K.editor({
                    allowFileManager: true
                });
  });

  var editor;
  KindEditor.ready(function(K) {
    editor = K.create('textarea[name="content"]', {
      allowFileManager : true ,
    afterBlur:function(){this.sync();}
    });
  });


  </script>