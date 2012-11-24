<?php
/**
 * User: nekosama
 * Date: 12-11-14
 * Time: 上午12:33
 */

class CommentModel extends Model{
    protected $tableName = 'comment';

    public function addComment($blog_item_id,$content){
        $user_id=session('user_id');
        $data['comment_user_id']=$user_id;
        $data['blogitem_id']=$blog_item_id;
        $data['content']=$content;
        $this->add($data);

        $like_model=new LikeModel();
        $like_model->addComment($blog_item_id);
    }
}