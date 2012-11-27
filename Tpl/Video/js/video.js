$(document).ready(function(){

//    添加拔取视频ajax事件
    $("#ctrltextpb-video-search-input").change(function(){
        $("#pb-video-search-tip span").text('搜索视频中');
        $.getJSON('http://127.0.0.1:8887/blog/VideoCrawler/crawler',{video_url : $(this)[0].value},function(data){
            if(data.statue=='true'){
                //搜索成功
                $("#pb-video-search-tip span").text('搜索成功！');
                $("#pb-video-preview-holder").css('display','block');
                $("#pb-video-search-holder").css('display','none');
                $("#pb-video-thumb").attr('src',data.img_path);
                $("#baidu_editor_0 p").text(data.title);
            }else{
                $("#pb-video-search-tip span").text('链接地址不正确！');
                //搜索失败
            }
        });
    });

//    初始化taginput
    $("#post-tag-input").tagsInput({
        'defaultText':'请输入tag',
        'height':'136px',
        'width':'188px'
    });
});