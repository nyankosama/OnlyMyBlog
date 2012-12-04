<?php
/**
 * User: nekosama
 * Date: 12-11-24
 * Time: 上午11:03
 */
import('@.ViewTpl.TplHomePage');

class HomeAction extends Action{
    private $conf;
    private $const;
    private $userModel;
    private $user_id;

    function HomeAction(){
        $this->conf=require('ActionConfig.php');
        $this->const=require(dirname(__FILE__)."/../Model/ModelConfig.php");
        $this->userModel=M('user');
    }

    private function  hasLoginCheck(){
        if(cookie('user_id')==null){
            header('location: '.$this->conf['APP_ROOT'].'Login/login');
            return false;
        }
        return true;
    }

    public function home(){
        if(!$this->hasLoginCheck())
            return;
        $user_id=session('user_id');
        $this->sign($user_id);
        $this->display('Home:homeTpl');
    }

    public function userblog($user_id){
        if(!$this->hasLoginCheck())
            return;
        $this->sign($user_id);
        $this->user_id=$user_id;
        $this->display('Home:userHomeTpl');
    }

    public function logout(){
        if(!$this->hasLoginCheck())
            return;
        cookie('user_id',null);
        echo json_encode(array('status'=>'true'));
    }

    private function sign($user_id){
        $data=$this->userModel->find($user_id);
        $this->home_user_id=$user_id;
        $this->home_user_link=$this->conf['APP_ROOT']."Home/userblog/user_id/".$user_id;
        $this->home_self_headPic=$data['head_pic_path'];
        $this->home_self_text='http://127.0.0.1:8887/blog/Home/text';
        $this->home_self_video='http://127.0.0.1:8887/blog/Home/video';
        $this->home_self_link='http://127.0.0.1:8887/blog/Home/link';
        $this->home_self_pic='http://127.0.0.1:8887/blog/Home/picture';
    }

    public function text(){
        if(!$this->hasLoginCheck())
            return;
        $this->display("Text:text");
    }

    public function tag($tag){
        if(!$this->hasLoginCheck())
            return;
        //TODO
    }

    public function video(){
        if(!$this->hasLoginCheck())
            return;
        $this->display("Video:video");
    }

    public function link(){
        if(!$this->hasLoginCheck())
            return;
        $this->display("Link:link");
    }

    public function picture(){
        if(!$this->hasLoginCheck())
            return;
        $this->display("Picture:picture");
    }

    /**
     * post : user_id
     * @param $is_user_blog
     */
    public function loadFeed($is_user_blog,$access_id){
        if(!$this->hasLoginCheck())
            return;
        $blogItemModel=new BlogItemModel();
        $user_id=session('user_id');
        if($is_user_blog=='true'){
            $blogitems=$blogItemModel->getItemsByLimitByUserId($access_id,50);
        }else{
            $blogitems=$blogItemModel->getAllFollowerBlog($user_id,50);
            if(count($blogitems)==0){
                $blogitems=$blogItemModel->getAllItemsByLimit(50);
            }
        }


        $likeModel=M('like');
        $commentModel=M('comment');
        $followUserModel=new FollowUserModel();
        $tpl=new TplHomePage();
        $html=null;

        foreach ($blogitems as $items) {
            $json_content=json_decode($items['json_content']);
            $para['blog_id']=$items['id'];
            $para['user_id']=$items['user_id'];
            $condition['id']=$items['user_id'];
            $user=$this->userModel->find($items['user_id']);

            //判断是否被用户follow

            $isFollowed=$followUserModel->hasFollowed($items['user_id']);
            if($isFollowed)
                $para['is_followed']='true';
            else
                $para['is_followed']='false';
            //判断是否为转载
            if($json_content->is_reposted=='true'){
                $origin_user_id=$json_content->original_user_id;
                $origin_user=$this->userModel->find($origin_user_id);
                $para['original_user_homepage']=$this->conf['APP_ROOT'].'Home/userblog/user_id/'.$origin_user_id;
                $para['original_user_head_name']=$origin_user['name'];
                $para['is_reposted']='true';
            }

            $para['user_head_pic']=$user['head_pic_path'];
            $para['user_head_name']=$user['name'];
            $para['user_homepage']=$this->conf['APP_ROOT'].'Home/userblog/user_id/'.$user['id'];
            $para['reposet_path']=$this->conf['APP_ROOT'].'PostBlog/repost/blog_id/'.$items['id'];

            $hot_point=$likeModel->query("select COUNT(*) as count from blog_like where blog_item_id = ".$items['id']);
            $repost_point=$likeModel->query("select COUNT(*) as count from blog_like where op_type=".$this->const['LIKE_TYPE_REPOST']."  and blog_item_id = ".$items['id']);
            $comment_point=$likeModel->query("select COUNT(*) as count from blog_like where op_type=".$this->const['LIKE_TYPE_COMMENT']."  and blog_item_id = ".$items['id']);
            $para['hot_point']=$hot_point[0]['count'];
            $para['repost_point']=$repost_point[0]['count'];
            $para['comment_point']=$comment_point[0]['count'];

            $tag_names=split(',',$items['tag']);
            $tag=array();
            foreach ($tag_names as $names) {
                $tag[]=array('href'=>$this->conf['APP_ROOT'].'Home/tag/tag/'.$names,'tag_name'=>$names);
            }
            $para['comment_blog_id']=$items['id'];
            $commentCondition['blogitem_id']=$items['id'];
            $comments=$commentModel->where($commentCondition)->select();
            $comment=array();
            foreach ($comments as $commentItem) {
                $comment_user=$this->userModel->find($commentItem['comment_user_id']);
                $comment[]=array('user_name'=>$comment_user['name'],'user_id'=>$comment_user['id'],
                    'user_homepage'=>$this->conf['APP_ROOT'].'Home/userblog/user_id/'.$comment_user['id'],
                    'user_head_picpath'=>$comment_user['head_pic_path'],'user_comment'=>$commentItem['content']);
            }

            //以下根据具体的blog_type来定制模板
            switch($items['type']){
                case $this->const['BLOG_ITEM_TYPE_WORD']:
                    $para['text_title']=$json_content->title;
                    $content=$json_content->desc_content;
                    if($html==null){
                        $html=$tpl->getTextTpl($para,$content,$tag);
                    }else{
                        $html.=$tpl->getTextTpl($para,$content,$tag);
                    }
                    break;
                case $this->const['BLOG_ITEM_TYPE_PICTURE']:
                    $content=$json_content->desc_content;
                    $para['pic_path']=$json_content->path;
                    if($html==null){
                        //TODO pictureTpl and database tables don't support muti-pictures
                        $html=$tpl->getPictureTpl($para,$content,$tag);
                    }else{
                        $html.=$tpl->getPictureTpl($para,$content,$tag);
                    }
                    break;
                case $this->const['BLOG_ITEM_TYPE_VIDEO']:
                    $para['video_id']=$items['id'];
                    $para['embed_value']=$json_content->embed_value;
                    $para['video_url']=$json_content->path;
                    $para['video_img_path']=$json_content->video_img_path;
                    $para['video_title']=$json_content->title;
                    $content=$json_content->desc_content;
                    if($html==null){
                        $html=$tpl->getVideoTpl($para,$content,$tag);
                    }else{
                        $html.=$tpl->getVideoTpl($para,$content,$tag);
                    }
                    break;
                case $this->const['BLOG_ITEM_TYPE_LINK']:
                    $para['link']=$json_content->path;
                    $para['title']=$json_content->title;
                    if($html==null){
                        $html=$tpl->getLinkTpl($para,$tag);
                    }else{
                        $html.=$tpl->getLinkTpl($para,$tag);
                    }
                    break;
            }
            $html.=$tpl->getCommonFooter($para,$comment);
            $para['is_reposted']=null;
        }
        echo $html;
    }
}