$(document).ready(function(){
    setTimeout(load,500);

    //test
    function load(){
//        $("#feed-list").load("http://127.0.0.1:8887/blog/Home/loadFeed");
        $.get("http://127.0.0.1:8887/blog/Home/loadFeed",function(data){
            $("#feed-list").append(data);
        });
        $("#ajax-waiting").css("display","none");
    }


});