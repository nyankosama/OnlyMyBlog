<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>OnlyMyBlog</title>
    <script type='text/javascript' src='__APP__/Tpl/Home/js/jquery.js'></script>
    <script type='text/javascript' src='__APP__/Tpl/Home/js/main_content.js'></script>
    <link href='__APP__/Tpl/Home/css/layout.css' rel='stylesheet' type='text/css'/>
</head>

<body>
<div id='header-holder' class='startpage'>
    <div id='header_logo'>
        <a href="http://127.0.0.1:8887/blog/Home/home" id="logo_href">OnlyMyBlog</a>
    </div>
    <h1> 让博客从此中二 </h1>
</div>
<div id='background'>
    <div id='content-holder'>
        <div id='content'>
            <div id='main' user-id=<?php echo ($home_user_id); ?>>
                <div id="ajax-waiting">
                    <img src="__APP__/Tpl/Home/img/loading.$6839.gif" alt="正在努力加载中"/>
                </div>

                <div class='feed-list' id='feed-list'>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>