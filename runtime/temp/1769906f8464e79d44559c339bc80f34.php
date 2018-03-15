<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:93:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/view\admin\article_category_edit.html";i:1519378124;s:68:"G:\PortableApps\PHPstudy\WWW\blog\application\view\admin\header.html";i:1516718356;s:68:"G:\PortableApps\PHPstudy\WWW\blog\application\view\admin\footer.html";i:1516717608;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/extend/H-ui/lib/html5shiv.js"></script>
<script type="text/javascript" src="/static/extend/H-ui/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/extend/H-ui/lib/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/extend/H-ui/lib/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/extend/H-ui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/extend/H-ui/lib/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/extend/H-ui/lib/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/static/extend/H-ui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加分类</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类名：</label>
		<div class="formControls col-xs-8 col-sm-7">
			<?php if(isset($name)): ?>
				<input type="text" class="input-text" value="<?php echo $name['name']; ?>" id="name" name="name">
			<?php else: ?>
				<input type="text" class="input-text" value="" id="name" name="name">
			<?php endif; ?>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/extend/H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/extend/H-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/extend/H-ui/lib/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/static/extend/H-ui/lib/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/extend/H-ui/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/extend/H-ui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/extend/H-ui/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
</body>
<script type="text/javascript">
$(function(){
	
	$("#form-admin-add").validate({
		rules:{
			name:{
				required:true,
				minlength:1,
				maxlength:16
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "<?php echo url('article_category'); ?>" ,
				success: function(data){
					if (data.code = 2000) {
						layer.msg(data.msg,{icon:1,time:1000});
					} else {
						layer.msg('code:'+data.code+' msg:'+data.msg,{icon:1,time:1000});
					}
				},
			});
			
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</html>