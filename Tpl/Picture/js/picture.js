$(document).ready(function(){
    var editor = new UE.ui.Editor();
    editor.render('editor');

    $("#post-tag-input").tagsInput({
        'defaultText':'请输入tag',
        'height':'136px',
        'width':'188px'
    });

    //暂时只支持单张图片
    //以下为发布时的post数据
    var picture_path;
    var content;
    var tag;

    $("#ctrlbuttonpb-submitlabel").click(function(){
        content=editor.getContent();
        tag=$("#post-tag-input").val();
        $.post('http://127.0.0.1:8887/blog/PostBlog/postPicture',{path:picture_path,content:content,tag:tag},
        function(data){
            if(data.status=="true"){
                window.location.href = 'home';
            }else{
                alert("发布失败！");
            }
        },'json');
    });

    //以下为jquery file upload
    var fileCount=0;
    var add_first=true;
    'use strict';
    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'http://127.0.0.1:8887/blog/Picture/fileupload',
        add: function(e, data){
//            增加上传区域
            if(data.files[0].id==null){
                var id=Date.parse(new Date()) + parseInt(Math.random() * 10000);
                data.files[0].id=id;

                var liHtml="<li class='clearfix' id="+id+">"+
                    "<a class='pb-photo-li-rm'>删除</a>"+
                    "<span class='pb-photo-li-name' style=''>"+data.files[0].name+"</span>"+
                    "<span class='pb-photo-li-progress'  style='background-position: -400px 50%;'></span>"+
                    "<span class='pb-photo-li-thumb' style='display: none'>"+

                    "<a href='#' class='rotate' title='点击旋转图片'></a>"+
                    "</span>"+
                    "<textarea class='pb-photo-desc' style='display: none'></textarea>"+
                    "<span class='pb-photo-li-tip'></span>"+
                    "</li>";
                $('#pb-photo-list').append(liHtml);

                $('.pb-photo-li-rm').click(function(){
                    var li=$(this).parent();
                    li.css('display','none');
                });
            }
            data.submit();
        },

        progress :function(e,data){
            var id = data.files[0].id;
            var progress = parseInt(data.loaded/data.total *100)*3-450;
            var tmp=$("#"+id).find('.pb-photo-li-progress');
            tmp.attr('style','background-position: '+progress+'px 50%;');
        },
        dataType: 'json',
        dropZone: $('#pb-photo-pick-holder'),
        done: function (e, data) {
            if(data.files!=null){
                var file=data.files[0];
                var result=data.result[0];
                var li=$("#"+file.id);
                li.find(".pb-photo-li-name").attr('style','display:none');
                li.find(".pb-photo-li-progress").attr('style','display:none');
                var img="<img src='"+result.url+"' width=100px height=100px>";
                li.find(".pb-photo-li-thumb").attr('style','');
                li.find(".pb-photo-li-thumb").prepend(img);
                li.find(".pb-photo-desc").attr('style','');
                console.dir(result);
                console.dir(file);
                picture_path=result.url;
            }
        }
    });

    if (window.location.hostname === 'blueimp.github.com') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            maxFileSize: 5000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            process: [
                {
                    action: 'load',
                    fileTypes: /^image\/(gif|jpeg|png)$/,
                    maxFileSize: 20000000 // 20MB
                },
                {
                    action: 'resize',
                    maxWidth: 1440,
                    maxHeight: 900
                },
                {
                    action: 'save'
                }
            ]
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                    $('<span class="alert alert-error"/>')
                        .text('Upload server currently unavailable - ' +
                        new Date())
                        .appendTo('#fileupload');
                });
            json
        }
    } else {
        // Load existing files:
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).done(function (result) {
                if (result && result.length) {
                    $(this).fileupload('option', 'done')
                        .call(this, null, {result: result});
                }
            });
    }
});