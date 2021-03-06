<?php
/**
 * User: nekosama
 * Date: 12-11-13
 * Time: 下午8:02
 */

class BlogItemModel extends Model{
    protected $tableName = 'blogitem';
    private $config;
    public  $model;

    function BlogItemModel(){
        $this->model=M('blogitem');
        $this->config=require('ModelConfig.php');
    }


    /**
     * 转载blog后续调用，不要主动调用
     * 暂时不支持转载添加描述
     * @param $blog_item_id 博客条目的id
     */
    public function repost($blog_item_id){
        $json_content=array();
        $item=$this->model->find($blog_item_id);
        $newItem['user_id']=session('user_id');
        $newItem['type']=$item['type'];
        $item_json_content=json_decode($item['json_content']);
        switch($item['type']){
            case $this->config['BLOG_ITEM_TYPE_WORD']:
                break;
            case $this->config['BLOG_ITEM_TYPE_PICTURE']:
                break;
            case $this->config['BLOG_ITEM_TYPE_VIDEO']:
                $json_content['embed_value']=$item_json_content->embed_value;
                $json_content['video_img_path']=$item_json_content->video_img_path;
                break;
            case $this->config['BLOG_ITEM_TYPE_LINK']:
                break;
        }
        $json_content['is_reposted']='true';
        $json_content['original_user_id']=$item['user_id'];
        $json_content['title']=$item_json_content->title;
        $json_content['desc_content']=$item_json_content->desc_content;
        $json_content['path']=$item_json_content->path;

        $newItem['json_content']=json_encode($json_content);
        $newItem['time']=$this->getTime();
        $newItem['tag']=$item['tag'];
        $this->model->add($newItem);

    }

    public function addWord($title,$content,$tag){
        $data['user_id']=session('user_id');
        $data['type']=$this->config['BLOG_ITEM_TYPE_WORD'];

        $json_content['title']=$title;
        $json_content['desc_content']=$content;
        $data['json_content']=json_encode($json_content);
        $data['tag']=$tag;
        $data['time']=$this->getTime();
        $this->model->add($data);
//        $this->add($data);
    }
    public function deleteWord($id){
        $this->model->delete($id);
    }

    public function addPicture($path,$desc,$tag){
        $data['user_id']=session('user_id');
        $data['type']=$this->config['BLOG_ITEM_TYPE_PICTURE'];
        $json_content['path']=$path;
        $json_content['desc_content']=$desc;
        $data['json_content']=json_encode($json_content);
        $data['tag']=$tag;
        $data['time']=$this->getTime();
        $this->model->add($data);
    }

    public function deletePicture($id){
        $this->model->delete($id);
    }

    public function addVideo($video_path,$video_img_path,$title,$desc,$tag,$embed_value){
        $data['user_id']=session('user_id');
        $data['type']=$this->config['BLOG_ITEM_TYPE_VIDEO'];
        $json_content['path']=$video_path;
        $json_content['desc_content']=$desc;
        $json_content['title']=$title;
        $json_content['embed_value']=$embed_value;
        $json_content['video_img_path']=$video_img_path;
        $data['json_content']=json_encode($json_content);
        $data['tag']=$tag;
        $data['time']=$this->getTime();
        $this->model->add($data);
    }

    public function deleteVideo($id){
        $this->model->delete($id);
    }

    public function addLink($path,$title,$tag){
        $data['user_id']=session('user_id');
        $data['type']=$this->config['BLOG_ITEM_TYPE_LINK'];
        $json_content['path']=$path;
        $json_content['title']=$title;
        $data['json_content']=json_encode($json_content);
        $data['tag']=$tag;
        $data['time']=$this->getTime();
        $this->model->add($data);
    }

    public function deleteLink($id){
        $this->model->delete($id);
    }

    /**
     * 按照时间顺序排序，获取用户的博客
     * @param $limit
     */
    public function getItemsByLimitByUserId($user_id,$limit){
        $condition['user_id']=$user_id;
        $data=$this->model->where($condition)->order('time asc')->limit('0,'.$limit)->select();
        return $data;
    }


    /**
     * 随便看看，返回所有博客，按照时间排序
     * @param $limit
     */
    public function getAllItemsByLimit($limit){
        $data=$this->model->order('time desc')->limit('0,'.$limit)->select();
        return $data;
    }

    /**
     * 返回用户所关注的所有用户的博客，按照时间排序
     * @param $limit
     */
    public function getAllFollowerBlog($user_id,$limit){
        $sql="user_id in (select bfu.follow_user_id from blog_follow_user bfu where bfu.user_id = ".$user_id.")";
        $data=$this->model->where($sql)->order('time desc')->limit('0,'.$limit)->select();
        return $data;
    }

    /**
     * @param $tag 单个tag
     * @param $limit
     */
    public function getAllTagBlog($tag,$limit){
        $map['tag'] = array('like',"%,".$tag.",%");
        $data=$this->model->where($map)->order('time asc')->limit('0,'.$limit)->select();
        return $data;
    }


    private function getTime(){
        $time=getdate();
        return $time['year']."-".$time['mon']."-".$time['mday']." ".$time['hours'].":".$time['minutes'].":".$time['seconds'];
    }
}