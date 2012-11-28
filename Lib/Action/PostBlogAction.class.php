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
        $title=$this->_post('title');
        $content=$this->_post('content');
        //$tag=explode(",",$this->_post('tag'));
        $tag=$this->_post('tag');
//        $tmp2=$tmp->select();
        $blogItem = new BlogItemModel();
        $blogItem->addWord($title,$content,$tag);
        echo json_encode(array('status'=>'true'));
    }

    public function postPicture(){
        echo 'fuck';
    }

    public function postVideo(){

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