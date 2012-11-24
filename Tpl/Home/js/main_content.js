$(document).ready(function(){
    setTimeout(load,100);

    //test
    function load(){
        $("#feed-list").load("http://127.0.0.1:8887/blog/Home/loadFeed");
        $("#ajax-waiting").css("display","none");
    }


});