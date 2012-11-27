<?php
/**
 * User: nekosama
 * Date: 12-11-13
 * Time: 下午11:28
 */

class FollowUserModel extends Model{
    protected $tableName = 'follow_user';
    private $model;

    function FollowUserModel(){
        $this->model=M('follow_user');
    }

    public function addFollowUser($follow_user_id){
        $user_id=session('user_id');
        $data['user_id']=$user_id;
        $data['follow_user_id']=$follow_user_id;
        $this->model->add($data);
    }

    public function disFollowUser($follow_user_id){
        $this->model->delete($follow_user_id);
    }
}