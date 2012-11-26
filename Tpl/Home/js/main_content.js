$(document).ready(function(){
    setTimeout(load,500);


    function registerEvent(){
        //注册所有的视频播放按钮事件
        $(".feed-video-img-holder").click(function(){
            $(".feed-video-img-holder").css("display","none");
            //插入视频div
            for(var i=0;i<$(this).length;i++){
                var par=$(this).next().parent()[0];
                var host_type=par.getAttribute('data-host-type');
                var embed_html=par.getAttribute('data-embed-value');
                var video_url=par.getAttribute('data-video-url');
                $(this).next().parent().prepend(embed_html);

                //注册关闭视频按钮事件
                $(".feed-video-close").click(function(){
                    var video=$(this).parent().parent();
                    var img=$(this).parent().parent().next();
                    video.css("display","none");
                    img.css("display","block");
                });
            }

        });


    }
    //test
    function load(){
//        $("#feed-list").load("http://127.0.0.1:8887/blog/Home/loadFeed");
        $.get("http://127.0.0.1:8887/blog/Home/loadFeed",function(data){
            $("#feed-list").append(data);
            registerEvent();
        });
        $("#ajax-waiting").css("display","none");

    }


});