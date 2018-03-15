<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/index\view\index\psn.html";i:1515990502;s:74:"G:\PortableApps\PHPstudy\WWW\blog\application\index\view\index\header.html";i:1515990524;s:74:"G:\PortableApps\PHPstudy\WWW\blog\application\index\view\index\footer.html";i:1515810002;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" ">
    <title>Ysama~psn</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/static/css/font-awesome.min.css">
    
</head>
<body style="background: #222">
<header class="head-box carousel-inner">
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