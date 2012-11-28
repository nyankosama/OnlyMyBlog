$(document).ready(function(){
    //初始化uditor
    var editor = new UE.ui.Editor();
    editor.render('editor');

    var video_title;
    var video_img_path;
    var video_embed_value;
    var video_url;

//    添加拔取视频ajax事件
    $("#ctrltextpb-video-search-input").change(function(){
        $("#pb-video-search-tip span").text('搜索视频中');
        video_url=$(this)[0].value;
        $.getJSON('http://127.0.0.1:8887/blog/VideoCrawler/crawler',{video_url : $(this)[0].value},function(data){
            if(data.statue=='true'){
                //搜索成功
                $("#pb-video-search-tip span").text('搜索成功！');
                $("#pb-video-preview-holder").css('display','block');
                $("#pb-video-search-holder").css('display','none');
                $("#pb-video-thumb").attr('src',data.img_path);
                editor.setContent(data.title);//设置描述为视频标题
                video_title=data.title;
                video_img_path=data.img_path;
                video_embed_value=data.embed_html;
            }else{
                $("#pb-video-search-tip span").text('链接地址不正确！');
                //搜索失败
            }
        });
    });

    $("#ctrlbuttonpb-submitlabel").click(function(){
        $.post('http://127.0.0.1:8887/blog/PostBlog/postVideo',
            {video_title:video_title,video_img_path:video_img_path,video_embed_value:video_embed_value,video_url:video_url},
            function(data){
                console.log(data);
                if(data.status=="true"){
                    window.location.href = 'home';
                }else{
                    alert("发布失败！");
                }
            },'json');
    });

//    初始化taginput
    $("#post-tag-input").tagsInput({
        'defaultText':'请输入tag',
        'height':'136px',
        'width':'188px'
    });
});