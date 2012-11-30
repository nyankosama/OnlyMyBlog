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

    function HomeAction(){
        $this->conf=require('ActionConfig.php');
        $this->const=require(dirname(__FILE__)."/../Model/ModelConfig.php");
        $this->userModel=M('user');
    }


    public function home(){
        $this->sign();
        $this->display('Home:homeTpl');
    }

    public function userblog($user_id){

    }

    public function test(){
    }

    private function sign(){
        $user_id=session('user_id');
        $data=$this->userModel->find($user_id);
        $this->home_self_link='#';
        $this->home_self_headPic=$data['head_pic_path'];
        $this->home_self_text='http://127.0.0.1:8887/blog/Home/text';
        $this->home_self_video='http://127.0.0.1:8887/blog/Home/video';
        $this->home_self_link='http://127.0.0.1:8887/blog/Home/link';
        $this->home_self_pic='http://127.0.0.1:8887/blog/Home/picture';
    }

    public function text(){
        $this->display("Text:text");
    }

    public function tag($tag){
        //TODO
    }

    public function video(){
        $this->display("Video:video");
    }

    public function link(){
        $this->display("Link:link");
    }

    public function picture(){
        $this->display("Picture:picture");
    }

    public function loadFeed(){
        $blogItemModel=new BlogItemModel();
        $blogitems=$blogItemModel->getAllItemsByLimit(10);

        $user_id=session('user_id');


        $likeModel=M('like');
        $commentModel=M('comment');
        $tpl=new TplHomePage();
        $html=null;

        foreach ($blogitems as $items) {
            $json_content=json_decode($items['json_content']);
            $para['blog_id']=$items['id'];
            $para['user_id']=$items['user_id'];
            $condition['id']=$items['user_id'];
            $user=$this->userModel->find($items['user_id']);
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
                    //TODO Link Tpl unfinished
                    break;
            }
            $html.=$tpl->getCommonFooter($para,$comment);
        }
        echo $html;
    }

    public function loadFeedTest(){
        $tpl=new TplHomePage();
        $para1=array(
            'blog_id'=>'1',
            'user_id'=>'1',
            'user_head_pic'=>'http://m3.img.libdd.com/farm3/194/5D903DD7FB4FD0DD6FA63CBE41AFCCC2_64_64.jpg',
            'user_head_name'=>'Nekosama',
            'user_homepage'=>'#',
            'text_title'=>'我是Dark flame master!',
            'reposet_path'=>'#',
            'hot_point'=>'4'
        );
        $content=array();
        $content="<p>哈哈哈哈啊哈！！！</p><p>我是中二！！！</p>";
        $tag=array(
            array(
                'href'=>'#',
                'tag_name'=>'中二'
            ),
            array(
                'href'=>'#',
                'tag_name'=>'动漫'
            )
        );

        $para1['comment_blog_id']=1;
        $para1['pic_path']='../Tpl/Home/img/2012.05.28-352.jpg';
        $para1['video_id']='1';
        $para1['embed_value']='<embed src="http://player.youku.com/player.php/sid/XNDY4MzAyMjE2/v.swf" allowfullscreen="true" quality="high" width="480" height="400" align="middle" allowscriptaccess="always" type="application/x-shockwave-flash">';
        $para1['video_url']='http://v.youku.com/v_show/id_XNDY1Mjg1MTYw.html';
        $para1['video_img_path']='http://g4.ykimg.com/0100641F4650A280E71EE202145CCEFACF6362-016C-31A3-5783-B6974E9C8AF4';
        $para1['video_title']='只有是哥哥有爱就没有问题的了对吧';
        $para1['video_host_type']='1';
        $comment=array(
            array(
                'user_name'=>'Nekosama',
                'user_id'=>'1',
                'user_homepage'=>'#',
                'user_head_picpath'=>'http://m3.img.libdd.com/farm2/29/33DD61040F667E4A2061166774C2DC1D_64_64.jpg',
                'user_comment'=>'FUCK!YOU!'
            )
        );
        $html=$tpl->getTextTpl($para1,$content,$tag);
        $html.=$tpl->getCommonFooter($para1,$comment);
        $html.=$tpl->getTextTpl($para1,$content,$tag);
        $html.=$tpl->getCommonFooter($para1,$comment);
        $html.=$tpl->getPictureTpl($para1,$content,$tag);
        $html.=$tpl->getCommonFooter($para1,$comment);
        $content="<p>哈哈哈哈啊哈！！！</p>";
        $html.=$tpl->getVideoTpl($para1,$content,$tag);
        $html.=$tpl->getCommonFooter($para1,$comment);
        echo $html;
    }
}