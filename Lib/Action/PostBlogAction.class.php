<?php
/**
 * User: nekosama
 * Date: 12-11-13
 * Time: 下午7:48
 */

class PostBlogAction extends Action{

    public function postWord(){
        $title=$this->_post('title');
        $content=$this->_post('content');
        //$tag=explode(",",$this->_post('tag'));
        $tag=$this->_post('tag');
//        $tmp2=$tmp->select();
        $blogItem = new BlogItemModel();
        $blogItem->addWord($title,$content,$tag);
    }

    public function postPicture(){
        echo 'fuck';
    }

    public function postVideo(){

    }

    public function postLink(){

    }
}