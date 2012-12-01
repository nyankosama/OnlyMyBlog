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

        //头像下拉菜单动画

        //添加回应按钮下拉panel事件
        $(".feed-cmt").click(function(){
            var feedFooter=$(this).parent().parent().parent().next();
            feedFooter.attr('style','');
            feedFooter.next().attr('style','display:none');
            feedFooter.find(".feed-fold-container").attr('style','');
        });

        $(".fold-btn-close").click(function(){
            var comment=$(this).parent().parent();
            comment.attr('style','display:none');
            comment.parent().attr('style','display:none');
            comment.parent().next().attr('style','');
        });

        //添加回应发布按钮事件
        //需要返回的json字符串key为:status, li_html
        $(".skin-button-willsilver").click(function(){
            var content=$(this).prev().val();
            var feed_list=$(this).parent().parent().parent().parent().parent().parent();
            var blog_id=feed_list.attr('id');
            var this_ele=$(this);
            $.post('http://127.0.0.1:8887/blog/PostBlog/postComment',{blog_id:blog_id,content:content},function(data){
                if(data.status=="true"){
                    //刷新评论栏
                    this_ele.parent().next().append(data.li_html);
                    var footer=this_ele.parent().parent().parent().parent();
                    var num=parseInt(footer.attr('data-comment-num'));
                    num+=1;
                    footer.attr('data-comment-num',num);
                    var tmp=footer.prev().find(".feed-cmt");
                    footer.prev().find(".feed-cmt").text("回应("+num+")");

                    var hot_num=parseInt(footer.prev().find(".feed-nt").attr('data-hot-num'));
                    hot_num+=1;
                    footer.prev().find(".feed-nt").text("热度("+hot_num+")");
                }else{
                    alert("发布失败！");
                }
            },'json');
        });

        //添加转载事件
        $(".feed-rt").click(function(){
            var blog_item_id=$(this).parent().parent().parent().parent().parent().attr('id');
            var this_ele=$(this);
            $.post('http://127.0.0.1:8887/blog/PostBlog/repost',{blog_item_id:blog_item_id},
            function(data){
                if(data.status=="true"){
                    var footer=this_ele.parent().parent().parent().next();
                    var num=parseInt(footer.attr('data-repost-num'));
                    num+=1;
                    footer.attr('data-repost-num',num);

                    var hot_num=parseInt(footer.prev().find(".feed-nt").attr('data-hot-num'));
                    hot_num+=1;
                    footer.prev().find(".feed-nt").text("热度("+hot_num+")");
                    footer.prev().find(".feed-rt").text("转载("+num+")");

                    alert('转载成功！')
                }else{
                    alert("转载失败！");
                }
            },'json');
        });

        //添加logout事件
        $("#logout").click(function(){
            $.post('http://127.0.0.1:8887/blog/Home/logout',function(data){
                if(data.status=="true"){
                    window.location.href = '../';
                }else{
                    alert("注销失败！");
                }
            },'json');
        });

        //增加关注事件
        $(".follow").click(function(){
            var user=$(this).parent().parent().parent().parent().parent();
            var user_id=user.attr('data-user-id');
            $.post('http://127.0.0.1:8887/blog/User/follow',{follow_user_id:user_id},
            function(data){
                if(data.status=='true'){
                    alert('关注成功');
                }else{
                    alert('操作失败');
                }
            },'json');
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