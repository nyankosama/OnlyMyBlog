<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>发布影像|OnlyMyBlog</title>
    <link rel="stylesheet" href="../Tpl/Video/themes/default/ueditor.css" />
    <link href='../Tpl/Video/css/dd.$7205.css' rel='stylesheet' type='text/css'/>
    <link href='../Tpl/Video/css/publisher.$7218.css' rel='stylesheet' type='text/css'/>
    <link href="../Tpl/Video/css/jquery.tagsinput.css" rel="stylesheet" type="text/css"/>
    <link href='../Tpl/Video/css/layout.css' rel='stylesheet' type='text/css'/>
    <script type='text/javascript' src='../Tpl/Video/js/jquery.js'></script>

    <script type="text/javascript" src="../Tpl/Video/js/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="../Tpl/Video/js/editor_config.js"></script>
    <script type="text/javascript" src="../Tpl/Video/js/editor.js"></script>
    <script type='text/javascript' src='../Tpl/Video/js/video.js'></script>

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
                        <span>发布影像</span>
                    </h2>
                    <!--标题下面的一块-->
                    <div id="pb-post-area">
                        <div id="pb-text-title-holder" class="pb-post-section">
                            <h3 class="pb-section-title">
                                视频链接
                            </h3>
                        </div>
                        <!--视频链接输入框-->
                        <div id="pb-video-search-holder" class="pb-post-section">
                            <div class="pb-input-tip" id="pb-video-search-tip">
                                <span style="color: red"></span>
                            </div>
                            <input type="text" id="ctrltextpb-video-search-input" name="pb-video-search-input" class="pb-input-text ui-text" cloud="" placeholder=""  data-control="pb-video-search-input">
                        </div>
                        <!--预览区域-->
                        <div id="pb-video-preview-holder" class="pb-post-media-preview clearfix" style="display:none;">
                            <a id="pb-video-repick-btn" class="pb-post-media-preview-close">重新选择视频</a>
                            <img id="pb-video-thumb" width="150" height="113">
                        </div>

                        <!--下面的内容编辑区-->
                        <div id="pb-text-post-holder" class="pb-post-section">
                            <h3 class="pb-section-title">描述</h3>
                            <div id="pb-text-textarea_editor">
                                <script type="text/plain" id="editor" style="width:604px"></script>
                            </div>

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