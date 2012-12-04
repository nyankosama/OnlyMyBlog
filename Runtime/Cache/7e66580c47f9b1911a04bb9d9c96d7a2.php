<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>OnlyMyBlog</title>
    <script type='text/javascript' src='../Tpl/Home/js/jquery.js'></script>
    <script type='text/javascript' src='../Tpl/Home/js/main_content.js'></script>
    <link href='../Tpl/Home/css/layout.css' rel='stylesheet' type='text/css'/>
</head>

<body>
<div id='header-holder' class='startpage'>
    <div id='header_logo'>
        <a href="http://127.0.0.1:8887/blog/Home/home" id="logo_href">OnlyMyBlog</a>
    </div>
    <h1> 让博客从此中二 </h1>
    <div id="header_logout">
        <a id="logout" title="退出" style="text-indent: -9999px;display: block">退出</a>
    </div>
</div>
<div id='background'>
    <div id='content-holder'>
        <div id='content'>
            <div id='main'>
                <div id='publisher' class='publisher clearfix' style=''>
                    <!--tplVar-->
                    <div class='pb-avatar'><a class='blog-avatar' href=<?php echo ($home_self_link); ?>
                                              style='background-image:url(<?php echo ($home_self_headPic); ?>)'>夕时雨</a>
                    </div>
                    <div class='pb-action-holder'>
                        <div class='pb-triangle'></div>
                        <div class='pb-action-shadow-top'></div>
                        <div class='pb-action' id='pb-action'>
                            <ul class='clearfix'>
                                <!--tplVar-->
                                <li><a class='text' href=<?php echo ($home_self_text); ?>>文字</a>
                                </li>
                                <li><a class='photo' href=<?php echo ($home_self_pic); ?>>图片</a>
                                </li>
                                <li><a class='music' href=<?php echo ($home_self_music); ?>>声音</a>
                                </li>
                                <li><a class='video' href=<?php echo ($home_self_video); ?>>影像</a>
                                </li>
                                <li><a class='link' href=<?php echo ($home_self_link); ?>>链接</a>
                                </li>
                            </ul>
                        </div>
                        <div class='pb-action-shadow-bottom'></div>
                    </div>
                </div>

                <div id="ajax-waiting">
                    <img src="../Tpl/Home/img/loading.$6839.gif" alt="正在努力加载中"/>
                </div>

                <div class='feed-list' id='feed-list'>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>