<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/view\admin\edit.html";i:1517142172;s:68:"G:\PortableApps\PHPstudy\WWW\blog\application\view\admin\footer.html";i:1516717608;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="/static/extend/editor/examples/css/style.css" />
        <link rel="stylesheet" href="/static/extend/editor/css/editormd.css" />
        <link rel="stylesheet" href="/static/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="/static/extend/H-ui/lib/static/h-ui/css/H-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css">
    </head>
    <body>
        <div id="layout">
            <form action="" method="post" class="form form-horizontal" id="form-article-add" style="">
                <div class="row cl" style="margin-bottom: 15px;">
                    <label class="form-label col-xs-4 col-xs-offset-1 col-sm-2">标题:</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <?php if(isset($article)): ?>
                            <input type="text" name="title" value="<?php echo $article['article_title']; ?>" class="input-text" style=" width:35%">
                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                            分类
                            <input type="text" name="category" value="<?php echo $category; ?>" class="input-text" style=" width:35%">
                        <?php else: ?>
                            <input type="text" name="title" placeholder="请输入标题~" value="" class="input-text" style=" width:35%">
                            分类
                            <input type="text" name="category" id="" placeholder="输入分类~" value="" class="input-text" style=" width:35%">
                        <?php endif; ?>
                    </div>
                </div>
                <div id="editormd">
                    <?php if(isset($article)): ?>
                        <textarea style="display:none;"><?php echo $article['article_con']; ?></textarea>
                    <?php else: ?>
                        <textarea style="display:none;"></textarea>
                    <?php endif; ?>
                </div>
                <div class="text-center" style="margin-bottom: 30px;">
                    <button onclick="article_submit(this);" class="btn btn-primary radius" type="button"><i class="fa fa-floppy-o"></i> 保存并提交</button>
                </div>
            </form>
        </div>
        <script src="/static/extend/editor/examples/js/jquery.min.js"></script>
        <script src="/static/extend/editor/editormd.js"></script>
        <!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/extend/H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/extend/H-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/extend/H-ui/lib/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/static/extend/H-ui/lib/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
        <script type="text/javascript">
            var Editor;
        

            $(function() {                
                Editor = editormd("editormd", {
                    width        : "90%",
                    height       : 720,
                    
                    // Editor.md theme, default or dark, change at v1.5.0
                    // You can also custom css class .editormd-preview-theme-xxxx
                    theme        : (localStorage.theme) ? localStorage.theme : "dark",
                    
                    // Preview container theme, added v1.5.0
                    // You can also custom css class .editormd-preview-theme-xxxx
                    previewTheme : (localStorage.previewTheme) ? localStorage.previewTheme : "dark", 
                    
                    // Added @v1.5.0 & after version is CodeMirror (editor area) theme
                    editorTheme  : (localStorage.editorTheme) ? localStorage.editorTheme : "pastel-on-dark", 
                    path         : '/static/extend/editor/lib/'
                });
                        
            });
            function article_submit(obj)
            {
                var data = $('#form-article-add').serialize();
                layer.confirm('确认要保存吗？',function(index){
                    $.ajax({
                        url: '/admin/edit&'+data,
                        type: 'get',
                        dataType: 'json',
                        success: function(data){
                            if (data.code == 2000) {
                                layer.msg(data.msg,{icon: 6,time:1000});
                            } else {
                                layer.msg(data.msg+',错误代码'+data.code,{icon: 6,time:1000});
                            }
                        }
                    });
                });
            }
        </script>
    </body>
</html>