<?php
/**
 * User: nekosama
 * Date: 12-11-13
 * Time: 下午7:48
 */

import('@.ViewTpl.TplHomePage');

class PostBlogAction extends Action{
    private $conf;
    private $tpl;

    function PostBlogAction(){
        $this->tpl=new TplHomePage();
        $this->conf=require('ActionConfig.php');
    }

    /**
     * post: title, content, tag
     */
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

    /**
     * post: path, content, tag
     */
    public function postPicture(){
        $blogItem = new BlogItemModel();
//        $path,$desc,$tag
        $path=$_POST['path'];
        $desc=$_POST['content'];
        $tag=$_POST['tag'];
        $blogItem->addPicture($path,$desc,$tag);
        echo json_encode(array('status'=>'true'));
    }

    /**
     * post: video_url, video_img_path, video_title, content, video_embed_value
     */
    public function postVideo(){
        $blogItem = new BlogItemModel();
        $video_url=$_POST['video_url'];
        $video_img_path=$_POST['video_img_path'];
        $title=$_POST['video_title'];
        $desc=$_POST['content'];
        $embed_value=$_POST['video_embed_value'];
        $tag=$_POST['tag'];
        $blogItem->addVideo($video_url,$video_img_path,$title,$desc,$tag,$embed_value);
        echo json_encode(array('status'=>'true'));
    }

    /**
     * post: path, content, tag
     */
    public function postLink(){
//        $path,$desc,$tag
        $blogItem = new BlogItemModel();
        $path=$_POST['path'];
        $desc=$_POST['content'];
        $tag=$_POST['tag'];
        $blogItem->addLink($path,$desc,$tag);
        echo json_encode(array('status'=>'true'));
    }

    /**
     * 跳到repost页面
     * url定义为Home/repost/blog_id/xxxx
     * post: blog_item_id
     */
    public function repost(){
        $blog_id=$_POST['blog_item_id'];
        $likeItem = new LikeModel();
        $likeItem->addRepost($blog_id);
        echo json_encode(array('status'=>'true'));
    }

    /**
     * 添加评论
     * post: blog_id, content
     */
    public function postComment(){
        $blog_id=$_POST['blog_id'];
        $content=$_POST['content'];
        $user_id=session('user_id');
        $commentModel=new CommentModel();
        $commentModel->addComment($blog_id,$content);

        $userModel=M('user');
        $comment_user=$userModel->find($user_id);
        $comment=array('user_name'=>$comment_user['name'],'user_id'=>$comment_user['id'],
            'user_homepage'=>$this->conf['APP_ROOT'].'Home/userblog/user_id/'.$comment_user['id'],
            'user_head_picpath'=>$comment_user['head_pic_path'],'user_comment'=>$content);

        $li_html=$this->tpl->getSingleCommentLi($comment,$commentModel->getSomeBlogCommentCount($blog_id));
        echo json_encode(array('status'=>'true','li_html'=>$li_html));
    }
}