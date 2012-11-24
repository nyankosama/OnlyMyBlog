<?php
/**
 * User: nekosama
 * Date: 12-11-13
 * Time: 下午9:34
 */

class FollowTagModel extends Model{
    /**
     * 增加tag关注
     * @param $tag 解析好的单个tag字符串
     */
    protected $tableName = 'follow_tag';

    public function addFollowTag($tag){
        $data['user_id']=session('user_id');
        $data['tag_name']=$tag;
        $this->add($data);
    }

    public function disFollowTag($tag){
        $condition['tag_name']=$tag;
        $this->where($condition)->delete();
    }
}