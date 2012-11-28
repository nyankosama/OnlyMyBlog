<?php
/**
 * User: nekosama
 * Date: 12-11-13
 * Time: 下午7:48
 */

class PostBlogAction extends Action{
    private $conf;

    function PostBlogAction(){
        $this->conf=require('ActionConfig.php');
    }

    public function postWord(){
        $title=$_POST['title'];
        $content=$_POST['content'];
        //$tag=explode(",",$this->_post('tag'));
        $tag=$_POST['tag'];
//        $tmp2=$tmp->select();
        $blogItem = new BlogItemModel();
        $blogItem->addWord($title,$content,$tag);
        echo json_encode(array('status'=>'true'));
    }

    public function postPicture(){
    }

    public function postVideo(){
        $blogItem = new BlogItemModel();
        //TODO write here
//        $blogItem->addVideo()
    }

    public function postLink(){

    }

    /**
     * 跳到repost页面
     * url定义为Home/repost/blog_id/xxxx
     */
    public function repost($blog_id){
        //TODO repost跳转
    }
}