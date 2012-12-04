$(document).ready(function(){

    $("#post-tag-input").tagsInput({
        'defaultText':'请输入tag',
        'height':'136px',
        'width':'188px'
    });

    //添加link发布事件
    $("#ctrlbuttonpb-submitlabel").click(function(){
        var title=$("#pb-text-title").val();
        var path=$("#pb-text-link").val();
        var tag=$("#post-tag-input").val();
        $.post('http://127.0.0.1:8887/blog/PostBlog/postLink',{title:title,path:path,tag:tag},function(data){
            if(data.status=='true'){
                window.location.href='home';
            }else{
                alert('发布失败');
            }
        },'json');
    });

});