<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>API开发文档</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="stylesheet" href="/Index/Static/Css/kancloud.min.css">
        <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/style.min.css">
        <!-- <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/tomorrow.css"> -->
        <!-- <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/jquery.atwho.min.css"> -->
         <!-- <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/hint.min.css"> -->
         <!-- <link rel="stylesheet" href="/Index/Static/Css/style.css"> -->
        <link charset="utf-8" rel="stylesheet" href="/Index/Static/Css/xq.css">
        </head>

<style type="text/css">
    .view-body table tr th, .view-body table tr td{border:1px dashed #f0f0f0;text-align: left;}
</style>
    <body style="">
        <div class="m-manual manual-reader manual-mode-view font-size-1 font-theme-0 manual-active">
            <div class="manual-head">
                <div class="left">
                    <span class="slidebar">
                        <i class="icon-menu"></i>
                    </span>
                    <a class="manual-title" href="/" title="返回文档首页">
                        <b class="text">API开发文档</b></a>
                      
                </div>

                   <a href="javascript:;" style="float: right;" onclick="pop('测试','<?php echo U('Doc/test',array('id'=>$get['id']));?>')">测试</a>
                <div style="display: none;">
                    <img src="/Index/Static/Css/cover_manual_thinkphp5.jpg"></div>
            </div>
            <div class="manual-body">
                <div class="manual-left">
                    <div class="manual-tab" style="bottom: 59px;">
                        <div class="tab-navg">
                            <span class="navg-item active">
                                <b class="text">目录</b></span>
                            <!-- <span class="navg-item">
                                <b class="text">搜索</b></span> -->
                        </div>
                        <div class="tab-wrap">
                            <div class="tab-item manual-catalog">
                                <div class="catalog-list read-book-preview jstree jstree-1 jstree-default">




<ul class="jstree-container-ul jstree-children jstree-wholerow-ul jstree-no-dots">

	<?php if(is_array($cate)): foreach($cate as $key=>$cate): ?><li class="jstree-node">
			
			<a class="jstree-anchor" id="cate_<?php echo ($cate["id"]); ?>" style="padding-left: 25px;width:270px">
				<i class="jstree-themeicon">◆</i>
				<font onclick="url('<?php echo U('index/index/index',array('id'=>$cate['id']));?>')">	<?php echo ($cate["title"]); ?> </font>
				<?php if(!empty($k)): ?><font style="color:blue" onclick="pop('修改 <?php echo ($cate["title"]); ?>','<?php echo U('Doc/cate',array('id'=>$cate['id']));?>');">修改</font><?php endif; ?>

				
			</a>
			
			<ul class="jstree-children x-ul">
				<?php if(is_array($cate["child"])): foreach($cate["child"] as $key=>$child): ?><a class="jstree-node x_a" id="cate_<?php echo ($child["id"]); ?>">
						<font onclick="url('<?php echo U('index/index/index',array('id'=>$child['id']));?>')"><?php echo ($child["title"]); ?> </font>
						<?php if(!empty($k)): ?><font style="color:blue"  onclick="pop('修改 <?php echo ($child["title"]); ?>','<?php echo U('Doc/cate',array('id'=>$child['id']));?>');">修改</font><?php endif; ?>
					</a><?php endforeach; endif; ?>
				<?php if(!empty($k)): ?><a class="jstree-node x_a" style="color:blue" href="javascript:pop('新增 <?php echo ($cate["title"]); ?> 子级','<?php echo U('Doc/cate',array('pid'=>$cate['id']));?>');">添加</a><?php endif; ?>
			</ul>
		</li><?php endforeach; endif; ?>

	<li class="jstree-node">
	<i class="jstree-icon"></i>
	<?php if(!empty($k)): ?><a class="jstree-anchor" style="color:blue;cursor: pointer;" onclick="pop('新增 顶级','<?php echo U('Doc/cate');?>');">

	<i class="jstree-themeicon">◆</i>添加
	</a><?php endif; ?>
	</li>
</ul>
                                </div>
                            </div>
                            <!-- 搜索 -->
                            <div class="tab-item manual-search">
                                <div class="search-inner">
                                    <div class="search-form">
                                        <form class="w-search" method="post" autocomplete="off">
                                            <label class="w-text text-m text-full search-enter">
                                                <input class="text-input" type="text" name="keyword" placeholder="请输入搜索关键词..."></label>
                                            <input type="hidden" name="book_id" value="7533">
                                            <button class="search-btn icon-search" type="submit"></button>
                                            <span class="form-loading">提交中...</span></form>
                                    </div>
                                    <div class="search-result"></div>
                                </div>
                            </div>
                            <!--/ 搜索 --></div>
                    </div>
                    <div class="m-copyright">
                        <p>©技术部
                            <br>版本：v1.0</p></div>
                </div>
                <div class="manual-right">
                    <div class="m-article">
                        <div class="article-head">
                            <h1><?php echo ($api["title"]); ?></h1></div>
                        <div class="article-wrap">
                            <div class="article-view">

		<?php if(!empty($api["syno"])): ?><h3 class="xq_title">接口介绍</h3>

                                    <div class="view-body think-editor-content;">
                                    <?php echo (htmlspecialchars_decode($api["syno"])); ?>
                                    </div><?php endif; ?>


                        <?php if(!empty($api["url"])): ?><h3 class="xq_title">请求地址<?php if(($api["type"]) == "1"): ?>【GET】<?php endif; if(($api["type"]) == "2"): ?>【POST】<?php endif; ?></h3>

                                    <div class="view-body think-editor-content;">
                                    <?php echo ($api["url"]); ?>
                                    </div><?php endif; ?>


                        <?php if(!empty($api["get"])): ?><h3 class="xq_title">GET参数</h3>

                                    <div class="view-body think-editor-content;">
                                    <table>
                                        <tr>
                                            <th>参数名</th>
                                            <th>参数值</th>
                                            <th>备注</th>
                                        </tr>
                                        <?php if(is_array($api["get"])): foreach($api["get"] as $key=>$get): ?><tr>
                                            <td><?php echo ($get["key"]); ?></td>
                                            <td><?php echo ($get["value"]); ?></td>
                                            <td><?php echo ($get["note"]); ?></td>
                                        </tr><?php endforeach; endif; ?>
                                    </table>
                                    </div><?php endif; ?>

                        <?php if(!empty($api["post"])): ?><h3 class="xq_title">POST参数</h3>

                                    <div class="view-body think-editor-content;">
                                    <table>
                                        <tr>
                                            <th>参数名</th>
                                            <th>参数值</th>
                                            <th>备注</th>
                                        </tr>
                                        <?php if(is_array($api["post"])): foreach($api["post"] as $key=>$post): ?><tr>
                                            <td><?php echo ($post["key"]); ?></td>
                                            <td><?php echo ($post["value"]); ?></td>
                                            <td><?php echo ($post["note"]); ?></td>
                                        </tr><?php endforeach; endif; ?>
                                    </table>
                                    </div><?php endif; ?>


                        <?php if(!empty($api["param"])): ?><h3 class="xq_title">POST参数详解</h3>

                                    <div class="view-body think-editor-content;">
                                          <?php echo (htmlspecialchars_decode($api["param"])); ?>
                                    </div><?php endif; ?>



                        <?php if(!empty($api["return"])): ?><h3 class="xq_title">返回参数</h3>

                                    <div class="view-body think-editor-content;">
                                          <?php echo (htmlspecialchars_decode($api["return"])); ?>
                                    </div><?php endif; ?>










                                <div class="view-foot">
                                    <div class="article-jump">
                                        <span class="jump-up" style="display: block;">上一篇：
				
                                            <a href="<?php echo U('index/index/index',array('id'=>$prew['id']?:$get['id']));?>"><?php echo ((isset($prew["title"]) && ($prew["title"] !== ""))?($prew["title"]):'无'); ?></a>

                                            </span>
                                        <span class="jump-down">下一篇：
                                            <a  href="<?php echo U('index/index/index',array('id'=>$next['id']?:$get['id']));?>"><?php echo ((isset($next["title"]) && ($next["title"] !== ""))?($next["title"]):'无'); ?></a>
                                            </span>
                                    </div>
                  
                                </div>
                            </div>
                      
                        </div>
                    </div>
                    <div class="manual-progress">
                    
                    </div>
                </div>
        
            </div>

       
        </div>
    </body>

</html>

<script type="text/javascript" src="/Public/JQuery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/Public/Layer/layer.js"></script>

<script type="text/javascript">
  function  pop(title,url){
     layer.open({
  type: 2,
  title:title,
  area: ['80%', '80%'],
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

<script type="text/javascript">
	$(function(){
		$('#cate_<?php echo ($get["id"]); ?>').css({'background':'#ddd','font-weight':'bold'});

                        console.log($('#cate_<?php echo ($get["id"]); ?>').offset().top);
                         $(".tab-item").scrollTop($('#cate_<?php echo ($get["id"]); ?>').offset().top-200);
	})
</script>

<script type="text/javascript">
    $(function(){
        $('.view-body table tr:eq(0) td').css({'font-weight':'bold','text-align':'center'});
    })
</script>