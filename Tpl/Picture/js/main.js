/*
 * jQuery File Upload Plugin JS Example 6.11
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/*jslint nomen: true, unparam: true, regexp: true */
/*global $, window, document */

$(function () {
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
            if(add_first){
                fileCount+=data.originalFiles.length;
                for(var i=0;i<data.originalFiles.length;i++){
                    var process_id=fileCount+i;
                    var liHtml="<li class='clearfix' id='photo-drag-upload_0'>"+
                        "<a class='pb-photo-li-rm'>删除</a>"+
                        "<span class='pb-photo-li-name' style=''>"+data.originalFiles[i].name+"</span>"+
                        "<span class='pb-photo-li-progress' id='"+process_id+"' style='background-position: -400px 50%;'></span>"+
                        "<span class='pb-photo-li-thumb' style='display: none'>"+

                        "<a href='#' class='rotate' title='点击旋转图片'></a>"+
                        "</span>"+
                        "<textarea class='pb-photo-desc' style='display: none'></textarea>"+
                        "<span class='pb-photo-li-tip'></span>"+
                        "</li>";
                    $('#pb-photo-list').append(liHtml);
                }
                add_first=false;
                $('.pb-photo-li-rm').click(function(){
                    var li=$(this).parent();
                    li.css('display','none');
                });
            }
            data.submit();
        },
        process:function(e,data){
            var progress = parseInt(data.loaded/data.total *100,10)*2.5;
        },
        dataType: 'json',
        dropZone: $('#pb-photo-pick-holder'),
        done: function (e, data) {
            add_first=true;
            $.each(data.result, function (index, file) {
                console.dir(file);
            });
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
