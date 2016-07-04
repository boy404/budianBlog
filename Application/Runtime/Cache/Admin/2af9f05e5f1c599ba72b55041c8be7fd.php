<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ($siteTitle); ?></title>
    <link rel="stylesheet" href="/Public/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Application/Admin/View/layout/style.css">
    <script src="/Public/jquery-3.0.0.min.js"></script>
    <script src="/Public/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/4.0.0-alpha/js/umd/modal.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/simditor-2.3.6/styles/simditor.css" />
    <script type="text/javascript" src="/Public/simditor-2.3.6/scripts/module.js"></script>
    <script type="text/javascript" src="/Public/simditor-2.3.6/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="/Public/simditor-2.3.6/scripts/uploader.js"></script>
    <script type="text/javascript" src="/Public/simditor-2.3.6/scripts/simditor.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
<div class="modal fade" id="exampleModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">提示</h4>
			</div>
			<div class="modal-body">
				<p>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<a class="btn btn-primary" id="deleteBottom">删除</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<nav class="navbar navbar-default nomargin">
  <div class="container">
      <h3 class="center-block">TBlog beta v0.1</h3>
    </div>
</nav>
<div class="sidebar-nav">
    <ul>
	<li><a href="#" data-target="#defaultList" class="nav-header" data-toggle="collapse"><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>默认列表</a></li>
	<li>
	<ul class="nav nav-pills nav-stacked collapse in" id="defaultList">
		<li><a href="/index.php/Admin/Index"> 管理首页</a></li>
		<li><a href="/index.php/Admin/Index/setting"> 网站设置</a></li>
		<li><a href="/index.php/Admin/Post/edit"> 撰写文章</a></li>
		<li><a href="/index.php/Admin/Post/meta"> 分类管理</a></li>
		<li><a href="/index.php/Admin/Comment/index"> 评论管理</a></li>
		<li><a href="/index.php/Admin/Post/pageIndex"> 独立页面</a></li>
		<li><a href="/index.php/Admin/Index/changePassword"> 修改密码</a></li>
		<li id="quit" class="collapse"><a href="/index.php/Admin/Index/exitAdmin">退出登录</a></li>
		<li><a href="/index.php"> 网站首页</a></li>
	</ul>
	</li>
</ul>
<script>
    $("#quit").on("click",function(){
        return true;
    })
</script>
</div>
<div class="content">
    
<div class="content-main">
	<div class="row">
        
		<div class="col-md-8">
		    <ol class="breadcrumb">
  <li><a href="/index.php/Admin/Index">管理首页</a></li>
  <li class="active">页面管理</li>
  <li><a href="/index.php/Admin/Post/pageEdit">创建一个独立页面</a></li>
</ol>
<div class="main">
    <?php if($rs): ?><ul class="pageIndex sortable" id="pageIndex">
	<?php if(is_array($rs)): foreach($rs as $key=>$p): ?><li data-pid="<?php echo ($p["PID"]); ?>"><a href="/index.php/Admin/Post/pageEdit/<?php echo ($p["PID"]); ?>"><?php echo ($p["title"]); ?></a></li><?php endforeach; endif; ?>
	</ul>
	<form action="/index.php/Admin/Post/pageSort" method="post">
	<input type="hidden" name="sortData" id="sortData" value=""/>
	<button type="submit" class="btn btn-primary  pull-right" id="save">保存排序</button>
	</form>
		<div style="clear:both"></div>
	<?php else: ?>
	    <h3>一个都没有。。。可以新建的。</h3><?php endif; ?>
</div>
    <script type="text/javascript" src="/Public/html5sortable-master/jquery.sortable.min.js"></script>
    <script>
    $('.sortable').sortable();
    $("#save").on("click",function(){
        var arr=new Array();
        var i=0,id;
        $("#pageIndex li").each(function(){
            id=$(this).data("pid");
            console.log(id);
            arr[i]=id;
            i++;
        });
        $("#sortData").val(JSON.stringify(arr));
        return true;
    });
    </script>

		</div>
	</div>
</div>
</div>

  </body>
</html>