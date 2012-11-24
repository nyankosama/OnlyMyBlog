<?php
/**
 * Like增加blog的热度有3种方式，分别是转载，喜欢和评论
 * User: nekosama
 * Date: 12-11-14
 * Time: 上午12:16
 */

class LikeModel extends Model{
    private $config;
    protected $tableName = 'like';

    function LikeModel(){
        $this->config=require('ModelConfig.php');
    }

    public function addLike($blog_item_id){
        $user_id=session('user_id');
        $data['like_user_id']=$user_id;
        $data['blog_item_id']=$blog_item_id;
        $data['op_type']=$this->config['LIKE_TYPE_REPOST'];
        $this->add($data);
    }

    /**
     * 转载blog的时候主动调用此方法
     * @param $blog_item_id
     * @param $comment
     */
    public function addRepost($blog_item_id,$comment){
        $user_id=session('user_id');
        $data['like_user_id']=$user_id;
        $data['blog_item_id']=$blog_item_id;
        $data['op_type']=$this->config['LIKE_TYPE_LIKE'];
        $this->add($data);

        $blog_item=new BlogItemModel();
        $blog_item->repost($blog_item_id,$comment);
    }

    public  function addComment($blog_item_id){
        $user_id=session('user_id');
        $data['like_user_id']=$user_id;
        $data['blog_item_id']=$blog_item_id;
        $data['op_type']=$this->config['LIKE_TYPE_COMMENT'];
        $this->add($data);
    }
}