<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/view\admin\article.html";i:1517589146;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="/static/extend/editor/css/style.css" />
        <link rel="stylesheet" href="/static/extend/editor/css/editormd.preview.css" />
        <style>            
            .editormd-html-preview {
                width: 90%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div id="layout">
            <header>
                <h1 style="text-align: center;"><?php echo $article['article_title']; ?></h1>   
            </header>
            <div id="test-editormd-view">
               <textarea style="display:none;" name="test-editormd-markdown-doc">###Hello world!</textarea>               
            </div>
            <div id="test-editormd-view2">
                <textarea id="append-test" style="display:none;"><?php echo $article['article_con']; ?></textarea>          
            </div>
        </div>
        <!-- <script src="js/zepto.min.js"></script>
		<script>		
			var jQuery = Zepto;  // 为了避免修改flowChart.js和sequence-diagram.js的源码，所以使用Zepto.js时想支持flowChart/sequenceDiagram就得加上这一句
		</script> -->
        <script src="/static/extend/editor/examples/js/jquery.min.js"></script>
        <script src="/static/extend/editor/lib/marked.min.js"></script>
        <script src="/static/extend/editor/lib/prettify.min.js"></script>
        
        <script src="/static/extend/editor/lib/raphael.min.js"></script>
        <script src="/static/extend/editor/lib/underscore.min.js"></script>
        <script src="/static/extend/editor/lib/sequence-diagram.min.js"></script>
        <script src="/static/extend/editor/lib/flowchart.min.js"></script>
        <script src="/static/extend/editor/lib/jquery.flowchart.min.js"></script>

        <script src="/static/extend/editor/editormd.js"></script>
        <script type="text/javascript">
            $(function() {
                var testEditormdView, testEditormdView2;
                
                $.get("test.md", function(markdown) {
                    
				    testEditormdView = editormd.markdownToHTML("test-editormd-view", {
                        markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
                        htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                        htmlDecode      : "style,script,iframe",  // you can filter tags decode
                        //toc             : false,
                        tocm            : true,    // Using [TOCM]
                        //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                        //gfm             : false,
                        //tocDropdown     : true,
                        // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                        emoji           : true,
                        taskList        : true,
                        tex             : true,  // 默认不解析
                        flowChart       : true,  // 默认不解析
                        sequenceDiagram : true,  // 默认不解析
                    });
                    
                    //console.log("返回一个 jQuery 实例 =>", testEditormdView);
                    
                    // 获取Markdown源码
                    //console.log(testEditormdView.getMarkdown());
                    
                    //alert(testEditormdView.getMarkdown());
                });
                    
                testEditormdView2 = editormd.markdownToHTML("test-editormd-view2", {
                    htmlDecode      : "style,script,iframe",  // you can filter tags decode
                    emoji           : true,
                    taskList        : true,
                    tex             : true,  // 默认不解析
                    flowChart       : true,  // 默认不解析
                    sequenceDiagram : true,  // 默认不解析
                });
            });
        </script>
    </body>
</html>