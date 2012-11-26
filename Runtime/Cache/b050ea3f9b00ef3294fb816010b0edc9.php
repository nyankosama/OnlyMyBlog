<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>发布图片|OnlyMyBlog</title>
    <script type='text/javascript' src='../Tpl/Picture/js/jquery.js'></script>
    <script type='text/javascript' src='../Tpl/Picture/js/text.js'></script>
    <script type="text/javascript" src="../Tpl/Picture/js/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="../Tpl/Picture/js/editor_config.js"></script>
    <script type="text/javascript" src="../Tpl/Picture/js/editor.js"></script>
    <link rel="stylesheet" href="../Tpl/Picture/themes/default/ueditor.css" />
    <link href='../Tpl/Picture/css/layout.css' rel='stylesheet' type='text/css'/>
    <link href='../Tpl/Picture/css/dd.$7205.css' rel='stylesheet' type='text/css'/>
    <link href='../Tpl/Picture/css/publisher.$7218.css' rel='stylesheet' type='text/css'/>
    <link href="../Tpl/Picture/css/jquery.tagsinput.css" rel="stylesheet" type="text/css"/>

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
                        <span>发布图片</span>
                    </h2>
                    <!--标题下面的一块-->
                    <div id="pb-post-area">

                        <!--图片预览区-->
                        <div id="pb-photo-list-holder" class="pb-post-section">
                            <ol id="pb-photo-list">

                            </ol>
                        </div>
                        <!--图片上传区-->
                        <div id="pb-photo-pick-holder" class="pb-post-section" style="margin-top: 20px">
                            <div class="drag-mask">拖拽多张图片到这里，直接上传</div>
                            <div id="pb-photo-flash-holder">
                                <span class="btn btn-success fileinput-button">
                                    <span>添加文件</span>
                                    <input type="file" name="files[]" multiple="">
                                </span>
                                <!--<object id="SWFUpload_0" type="application/x-shockwave-flash" data="http://s.libdd.com/js/lib/swfupload/swfupload.swf" width="110" height="38" class="swfupload">-->
                                    <!--<param name="wmode" value="transparent">-->
                                    <!--<param name="movie" value="http://s.libdd.com/js/lib/swfupload/swfupload.swf">-->
                                    <!--<param name="quality" value="high">-->
                                    <!--<param name="menu" value="false">-->
                                    <!--<param name="allowScriptAccess" value="always">-->
                                    <!--<param name="flashvars" value="movieName=SWFUpload_0&amp;uploadURL=http%3A%2F%2Fwww.diandian.com%2Fupload&amp;useQueryString=false&amp;requeueOnError=false&amp;httpSuccess=&amp;assumeSuccessTimeout=0&amp;params=imgsize%3Ds100%26amp%3BpublisherBlogId%3D12144170%26amp%3BpublisherTempUserId%3D12630468&amp;filePostName=Filedata&amp;fileTypes=*.jpg%3B*.png%3B*.gif%3B*.jpeg%3B*.bmp%3B*.JPG%3B*.PNG%3B*.GIF%3B*.JPEG%3B*.BMP%3B*.Jpg%3B*.Png%3B*.Gif%3B*.Jpeg%3B*.Bmp&amp;fileTypesDescription=Images&amp;fileSizeLimit=20MB&amp;fileUploadLimit=40&amp;fileQueueLimit=40&amp;debugEnabled=false&amp;buttonImageURL=http%3A%2F%2Fs.libdd.com%2Fimg%2Felement%2Fupload-photo.%245106.png&amp;buttonWidth=110&amp;buttonHeight=38&amp;buttonText=&amp;buttonTextTopPadding=0&amp;buttonTextLeftPadding=0&amp;buttonTextStyle=color%3A%20%23000000%3B%20font-size%3A%2016pt%3B&amp;buttonAction=-110&amp;buttonDisabled=false&amp;buttonCursor=-2">-->
                                <!--</object>-->
                            </div>
                            <div class="pb-photo-upload-tip">
                                <p>JPG, GIF, PNG或BMP，单张最大20M，最多40张<span id="canDragUpload" style="">，<span>支持文件拖拽</span></span>
                                </p>
                            </div>
                        </div>
                        <!--下面的内容编辑区-->
                        <div id="pb-text-post-holder" class="pb-post-section">
                            <h3 class="pb-section-title">内容</h3>
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
<script type="text/javascript">
    var editor = new UE.ui.Editor();
    editor.render('editor');
</script>
</html>