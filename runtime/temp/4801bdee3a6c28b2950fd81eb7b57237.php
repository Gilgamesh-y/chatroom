<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/view\index\index.html";i:1519702430;s:68:"G:\PortableApps\PHPstudy\WWW\blog\application\view\index\footer.html";i:1517676332;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" ">
    <title>Ysama~首页</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/static/css/font-awesome.min.css">
</head>
<body style="background: #222">
<header class="head-box carousel-inner">
    <div class="bg-img" onmouseover="set_height()" style="background: url(/static/picture/bg-img.jpg);background-repeat: no-repeat;background-attachment: fixed;background-size:100% auto;"></div>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="col-lg-8 col-lg-offset-2 collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">首页</a></li>
                    <li><a href="/music">音乐</a></li>
                    <li><a href="/psn">PSN</a></li>
                    <li><a href="/link">链接</a></li>
                    <li><a href="/message">留言板</a></li>
                    <li><a href="/about">关于我</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="row" style="margin-bottom: 40px">
        <div class="col-lg-8 col-lg-offset-2">
            <h3 class="col-lg-12 text-center"><a href="/<?php echo $vo['id']; ?>" style="color: #999999"><?php echo $vo['article_title']; ?></a></h3>
            <div class="col-lg-12 text-center panel-group">
                <span class="fa fa-clock-o"> <?php echo date("Y-m-d H:i:s",$vo['create_time']); ?> </span>
                <span class="fa fa-eye" style="margin: 0 10px;"> 围观 <?php echo $vo['hits']; ?> 次</span>
                <span class="fa fa-comment-o"> 活捉 <?php echo replyNum($vo['id']); ?> 条</span>
                <span class="fa fa-comment-o" style="margin: 0 10px;"><a href="" style="color: #999;"> <?php echo category($vo['category']); ?></a></span>
            </div>
            <div class="col-lg-12 panel-group">
                <?php if(!(empty($vo['img']) || (($vo['img'] instanceof \think\Collection || $vo['img'] instanceof \think\Paginator ) && $vo['img']->isEmpty()))): ?>
                    <img class="img-thumbnail" src="<?php echo $vo['img']; ?>" />
                <?php endif; ?>
            </div>
            <div class="col-lg-12">
                <p style="color: #CCCCCC"><?php echo subtext(strip_tags($vo['article_html'] ), 200); ?></p>
            </div>
            <div class="col-lg-12 text-center">
                <a href="/<?php echo $vo['id']; ?>" style="color: #666666">阅读全文</a>
            </div>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>


    <div class="col-lg-8 col-lg-offset-2 text-center">
        <?php echo $list->render(); ?>
    </div>
    
</div>



<footer class="container-fluid text-center" style="margin-top: 60px;">
    <p>Made by Ysama</p>
    <p></p>
</footer>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/bootstrap.js"></script>
<script src="/static/extend/layer/layer.js"></script>
<script type="text/javascript">
        function set_height() {
            $width = $(".bg-img").width();
            $height = $width * 0.499;
            $(".bg-img").css("height",$height);
        }
        set_height();
    </script>
</body>
</html>