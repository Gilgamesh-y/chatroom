<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/index\view\index\music.html";i:1516112520;s:74:"G:\PortableApps\PHPstudy\WWW\blog\application\index\view\index\header.html";i:1515990524;s:74:"G:\PortableApps\PHPstudy\WWW\blog\application\index\view\index\footer.html";i:1515810002;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" ">
    <title>Ysama~music</title>
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
<style type="text/css">
    a {
        color: inherit;
    }
    a:hover,a:link,a:visited {
        color: inherit;
    }
</style>
<div class="container">
    <div class="col-lg-8 col-lg-offset-2 panel-group">
        <div>
            <img class="img-rounded" src="/static/picture/test.png" style="float: left;" />
        </div>
        <div class="col-lg-10">
            <h3 class="col-lg-3 text-center" style="margin: 0 0 5px"><a class="col-lg-12" href="">伊飘雪</a></h3>
            <div class="col-lg-12" style="border-top: 1px solid #ccc;height: 1px;border-radius: 49%;margin: 5px 0;"></div>
            <div class="col-lg-12">
                <a class="col-lg-2 text-center" style="" href=""><strong>12</strong><br><span>动态</span></a>
                <a class="col-lg-2 text-center" href=""><strong>12</strong><br><span>关注</span></a>
                <a class="col-lg-2 text-center" href=""><strong>12</strong><br><span>粉丝</span></a>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-lg-offset-2 panel-group" style="border: 1px solid #ccc;height: 1px;border-radius: 50%;"></div>
    <div class="col-lg-8 col-lg-offset-2">
        <table class="table">
            <caption>所有音乐</caption>
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="30%">Music Name</th>
                    <th width="30%">Singer Name</th>
                    <th width="35%">Times</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td><a href="javascript:void(0);">Mark</a></td>
                    <td><a href="javascript:void(0);">Otto</a></td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                <span class="sr-only">40% 完成</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th>2</th>
                    <td><a href="javascript:void(0);">Mark</a></td>
                    <td><a href="javascript:void(0);">Thornton</a></td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                <span class="sr-only">40% 完成</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td><a href="javascript:void(0);">Mark</a></td>
                    <td><a href="javascript:void(0);">the Bird</a></td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                <span class="sr-only">40% 完成</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
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