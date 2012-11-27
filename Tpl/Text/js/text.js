$(document).ready(function(){
    var editor = new UE.ui.Editor();
    editor.render('editor');

    $("#post-tag-input").tagsInput({
        'defaultText':'请输入tag',
        'height':'136px',
        'width':'188px'
    });

    $("#ctrlbuttonpb-submitlabel").click(function(){
        var content=editor.getContent();
        var title=$("#pb-text-title").val();
        var tag=$("#post-tag-input").val();
        $.post('http://127.0.0.1:8887/blog/PostBlog/postWord',{title:title,content:content,tag:tag});
    });
});