<?php
/**
 * User: nekosama
 * Date: 12-11-24
 * Time: 上午11:03
 */
import('@.ViewTpl.TplHomePage');

class HomeAction extends Action{
    private $conf;

    function HomeAction(){
        $this->conf=require('ActionConfig.php');
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
        $this->home_self_link='#';
        $this->home_self_headPic='http://m3.img.libdd.com/farm3/194/5D903DD7FB4FD0DD6FA63CBE41AFCCC2_64_64.jpg';
        $this->home_self_text='http://127.0.0.1:8887/blog/Home/text';
        $this->home_self_video='http://127.0.0.1:8887/blog/Home/video';
        $this->home_self_link='http://127.0.0.1:8887/blog/Home/link';
        $this->home_self_pic='http://127.0.0.1:8887/blog/Home/picture';
    }

    public function text(){
        $this->display("Text:text");
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

        $userModel=M('user');
        $likeModel=M('like');

        foreach ($blogItemModel as $items) {
            $para['blog_id']=$items->id;
            $para['user_id']=$items->user_id;
            $condition['id']=$items->user_id;
            $user=$userModel->where($condition)->select()[0];
            $para['user_head_pic']=$user->head_pic_path;
            $para['user_head_name']=$user->name;
            $para['user_homepage']=$this->conf['APP_ROOT'].'Home/userblog/user_id/'.$user->id;
            $para['text_title']=$items->title;
            $para['reposet_path']=$this->conf['APP_ROOT'].'PostBlog/repost/blog_id/'.$items->id;
            $hot_point=$likeModel->query("select COUNT(*) from blog_like where blog_item_id = ".$items->id)[0];
            $para['hot_point']=$hot_point;
            $content=$items->desc_content;
            $para['tag']=$items->tag;

            //TODO reload待完成
        }


        $tpl=new TplHomePage();
        $html=$tpl->getTextTpl($para1,$content,$tag);
        $html.=$tpl->getCommonFooter($para1,$comment);
    }

    public function loadFeed1(){
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