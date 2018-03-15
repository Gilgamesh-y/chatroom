<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/index\view\index\index.html";i:1515990534;s:74:"G:\PortableApps\PHPstudy\WWW\blog\application\index\view\index\footer.html";i:1515810002;}*/ ?>
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
                    <li class="active"><a href="<?php echo url('index'); ?>">首页</a></li>
                    <li><a href="<?php echo url('music'); ?>">音乐</a></li>
                    <li><a href="<?php echo url('psn'); ?>">PSN</a></li>
                    <li><a href="#">链接</a></li>
                    <li><a href="#">留言板</a></li>
                    <li><a href="#">关于我</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="row" style="margin-bottom: 40px">
        <div class="col-lg-8 col-lg-offset-2">
            <h3 class="col-lg-12 text-center"><a href="<?php echo url('article'); ?>" style="color: #999999">Bootstrap 导航栏可以动态定位</a></h3>
            <div class="col-lg-12 text-center panel-group">
                <span class="fa fa-clock-o"> 发表于 2017/12/12 </span>
                <span class="fa fa-eye" style="margin: 0 10px;"> 围观 12 </span>
                <span class="fa fa-comment-o"> 活捉 66 </span>
            </div>
            <div class="col-lg-12 panel-group">
                <img class="img-thumbnail" src="/static/picture/bg-img.jpg" />
            </div>
            <div class="col-lg-12">
                <p style="color: #CCCCCC">Bootstrap 导航栏可以动态定位。默认情况下，它是块级元素，它是基于在 HTML 中放置的位置定位的。通过一些帮助器类，您可以把它放置在页面的顶部或者底部，或者您可以让它成为随着页面一起滚动的静态导航栏。
如果您想要让导航栏固定在页面的顶部，请向 .navbar class 添加 class .navbar-fixed-top。下面的实例演示了这点：</p>
            </div>
            <div class="col-lg-12 text-center">
                <a href="" style="color: #666666">阅读全文</a>
            </div>
        </div>
    </div>


    <div class="col-lg-8 col-lg-offset-2 text-center">
        <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div>



<footer class="container-fluid text-center" style="margin-top: 60px;">
    <p>Made by Ysama</p>
    <p></p>
</footer>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/bootstrap.js"></script>
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