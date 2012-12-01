<?php
/**
 * User: nekosama
 * Date: 12-12-1
 * Time: 下午4:25
 */

class UserAction extends Action{

    /**
     * post: follow_user_id
     */
    public function follow(){
        $follow_user_id=$_POST['follow_user_id'];
        $user_id=session('user_id');
        $followUserModel=new FollowUserModel();
        $followUserModel->addFollowUser($follow_user_id);
        echo json_encode(array('status'=>'true'));
    }
}