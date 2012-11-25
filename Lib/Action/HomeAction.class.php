<?php
/**
 * User: nekosama
 * Date: 12-11-24
 * Time: 上午11:03
 */
import('@.ViewTpl.TplHomePage');

class HomeAction extends Action{
    public function home(){
        $this->sign();
        $this->display('Home:homeTpl');
    }

    public function test(){
    }

    private function sign(){
        $this->home_self_link='#';
        $this->home_self_headPic='http://m3.img.libdd.com/farm3/194/5D903DD7FB4FD0DD6FA63CBE41AFCCC2_64_64.jpg';
    }

    public function loadFeed(){
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
        $content[]='哈哈哈哈哈哈哈哈哈！！';
        $content[]='我是黑暗火焰骑士！！！';
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
        echo $html;
    }
}