$(document).ready(function(){
    load();

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
                $html='<div class="feed-video-footer clearfix"><span class="feed-video-link"><a href="http://v.youku.com/v_show/id_XNDc0Mzg4MTA4.html" target="_blank">youku.com</a>→</span><a class="feed-video-close">关闭视频</a></div>';
                embed_html='<div class="feed-full-video-wrap clearfix">'+embed_html;
                embed_html+=$html;
                embed_html+='</div>';
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

        //喜欢事件
        $(".feed-fav").click(function(){
            if($(this).attr('like')==null)
                $(this).attr('like','false');
            if($(this).attr('like')=='true'){
                //取消标记喜欢
                $(this).attr('class',"feed-fav");
                $(this).attr('like','false');
            }else{
                //标记为喜欢
                $(this).attr('class',"feed-fav-click feed-fav");
                $(this).attr('like','true');
            }

        });


    }
    //test
    function load(){
//        $("#feed-list").load("http://127.0.0.1:8887/blog/Home/loadFeed");
        $.get("http://127.0.0.1:8887/blog/Home/loadFeed",function(data){
            $("#feed-list").append(data);
            registerEvent();
            $("#ajax-waiting").css("display","none");
        });
    }


});