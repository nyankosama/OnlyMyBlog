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
                var flash_url=par.getAttribute('data-flash-url');
                var video_url=par.getAttribute('data-video-url');
                switch (host_type){
                    case '1'://优酷
                        var html="<div class='feed-full-video-wrap clearfix'>"+
                            "<div class='feed-full-video'>"+
                            "<object width='500' height='385'>"+
                            "<param name='allowscriptaccess' value='sameDomain'>"+
                            "<param name='wmode' value='transparent'>"+
                            "<param name='allowfullscreen' value='true'>"+
                            "<param name='movie'"+
                            " value='"+flash_url+"'>"+
                            " <embed src='"+flash_url+"'"+
                            " allowFullScreen='true' quality='high' width='480' height='400' align='middle'"+
                            " allowScriptAccess='always' type='application/x-shockwave-flash'>"+
                            " </embed>"+
                            " </object>"+
                            " </div>"+
                            " <div class='feed-video-footer clearfix'><span class='feed-video-link'><a"+
                            " href='"+video_url+"' target='_blank'>youku.com</a>→</span><a"+
                            "  class='feed-video-close'>关闭视频</a></div>"+
                            " </div>";

                        $(this).next().parent().prepend(html);
                        break;
                    case '2'://bilibili
                        break;

                }
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