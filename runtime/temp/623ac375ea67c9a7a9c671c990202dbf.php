<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"G:\PortableApps\PHPstudy\WWW\blog\public/../application/index\view\admin\edit.html";i:1516543348;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="/static/extend/editor/examples/css/style.css" />
        <link rel="stylesheet" href="/static/extend/editor/css/editormd.css" />
        <style>
            /* Custom Editor.md theme css example */
            /*
            .editormd-theme-dark {
                border-color: #1a1a17;
                
            }
            
            .editormd-theme-dark .editormd-toolbar {
                background: #1A1A17;
                border-color: #1a1a17;
            }
            
            .editormd-theme-dark .editormd-menu > li > a {
                color: #777;
                border-color: #1a1a17;
            }
            
            .editormd-theme-dark .editormd-menu > li.divider {
                border-right: 1px solid #111;
            }
            
            .editormd-theme-dark .editormd-menu > li > a:hover, .editormd-menu > li > a.active {
                border-color: #333;
                background: #333;
            }*/
        </style>
    </head>
    <body>
        <div id="layout">
            <div id="test-editormd">
                <textarea style="display:none;"></textarea>
            </div>
        </div>
        <script src="/static/extend/editor/examples/js/jquery.min.js"></script>
        <script src="/static/extend/editor/editormd.js"></script>
        <script type="text/javascript">
            var testEditor;
        

            $(function() {                
                testEditor = editormd("test-editormd", {
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
        </script>
    </body>
</html>