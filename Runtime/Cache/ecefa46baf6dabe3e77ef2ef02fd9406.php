<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>发布链接|OnlyMyBlog</title>
    <script type='text/javascript' src='../Tpl/Link/js/jquery.js'></script>
    <script type='text/javascript' src='../Tpl/Link/js/link.js'></script>
    <script type="text/javascript" src="../Tpl/Link/js/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="../Tpl/Link/js/editor_config.js"></script>
    <script type="text/javascript" src="../Tpl/Link/js/editor.js"></script>
    <link rel="stylesheet" href="../Tpl/Link/themes/default/ueditor.css" />
    <link href='../Tpl/Link/css/layout.css' rel='stylesheet' type='text/css'/>
    <link href='../Tpl/Link/css/dd.$7205.css' rel='stylesheet' type='text/css'/>
    <link href='../Tpl/Link/css/publisher.$7218.css' rel='stylesheet' type='text/css'/>
    <link href="../Tpl/Link/css/jquery.tagsinput.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div id="wrap">
    <div id='header-holder' class='startpage'>
        <div id='header_logo'></div>
        <h1> 让博客从此中二 </h1>
    </div>
    <div id="content-holder">
        <div id="content">
            <!--内容的顶部-->
            <div class="pb-main-top clearfix">
                <div class="l">&nbsp;</div>
                <div class="r">&nbsp;</div>
            </div>
            <!--内容的中间-->
            <div class="pb-wrapper clearfix">
                <!--左边-->
                <div id="pb-main">
                    <!--标题-->
                    <h2 id="pb-main-title" class="clearfix">
                        <span>发布链接</span>
                    </h2>
                    <!--标题下面的一块-->
                    <div id="pb-post-area">
                        <!--标题输入框-->
                        <div id="pb-text-title-holder" class="pb-post-section">
                            <h3 class="pb-section-title">
                                标题
                            </h3>
                            <input tabindex="1" type="text" name="pb-text-title" class="pb-input-text" id="pb-text-title">
                        </div>

                        <div id="pb-text-link-holder" class="pb-post-section">
                            <h3 class="pb-section-title">
                                链接地址
                            </h3>
                            <input tabindex="1" type="text" name="pb-text-title" class="pb-input-text" id="pb-text-link">
                        </div>
                    </div>
                    <!--下面button-->
                    <div id="pb-action-holder" class="clearfix">
                        <!--发布按钮-->
                        <div class="pb-submit">
                            <div cloud="" id="ctrlbuttonpb-submit" data-control="pb-submit" class="ui-button skin-button-willblue" style="width: 70px;">
                                <span class="ui-button-bg-left skin-button-willblue-bg-left"></span>
                                <div id="ctrlbuttonpb-submitlabel" class="ui-button-label skin-button-willblue-label">
                                    <span id="ctrlbuttonpb-submittext" class="ui-button-text skin-button-willblue-text">发布</span>
                                </div>
                            </div>
                        </div>
                        <!--取消-->
                        <div class="pb-cancel">
                            <div cloud="" id="ctrlbuttonpb-cancel" data-control="pb-cancel" class="ui-button skin-button-willlight" style="width: 70px;">
                                <span class="ui-button-bg-left skin-button-willlight-bg-left"></span>
                                <div id="ctrlbuttonpb-cancellabel" class="ui-button-label skin-button-willlight-label">
                                    <span id="ctrlbuttonpb-canceltext" class="ui-button-text skin-button-willlight-text">取消</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--右边-->
                <div id="pb-aside" style="position: static; top: 0px; left: 0px;">
                    <!--tag添加面板-->
                    <div id="pb-aside-i">
                        <div class="pb-mod">
                            <div id="post-tag-holder" class="aside-item">
                                <div id="post-tag">
                                    <!--<ul id="post-tag-list" class="clearfix" style="zoom: 1;">-->
                                    <!--</ul>-->
                                    <div id="post-tag-input-holder">
                                        <input type="text" name="post-tag-input" id="post-tag-input" tip="{&quot;class&quot;:&quot;pb-tag-tip&quot;,&quot;text&quot;:&quot;添加标签...&quot;}" class="">
                                    </div>
                                </div>
                            </div>
                            <div id="recommand-tag-holder" class="aside-item" style="display:none;">
                                <ul id="recommand-tag-list" class="clearfix"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--内容的底部-->
            <div class="pb-main-bottom clearfix">
                <div class="l">&nbsp;</div>
                <div class="r">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>