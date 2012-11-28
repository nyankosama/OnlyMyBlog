<?php
/**
 * User: nekosama
 * Date: 12-11-13
 * Time: 下午8:02
 */

class BlogItemModel extends Model{
    protected $tableName = 'blogitem';
    private $config;
    private $model;

    function BlogItemModel(){
        $this->model=M('blogitem');
        $this->config=require('ModelConfig.php');
    }


    /**
     * 转载blog后续调用，不要主动调用
     * @param $blog_item_id 博客条目的id
     */
    public function repost($blog_item_id,$comment){
        $item=$this->model->find($blog_item_id);
        $newItem['user_id']=session('user_id');
        $newItem['type']=$item['type'];
        $newItem['title']=$item['title'];
        if($comment!=''){
            $newItem['desc_content']=$comment."<br/>".$item['desc_content'];
        }else{
            $newItem['desc_content']=$item['desc_content'];
        }
        $newItem['path']=$item['path'];
        $newItem['time']=$item['time'];
        $newItem['tag']=$item['tag'];
        $this->model->add($newItem);
    }

    public function addWord($title,$content,$tag){
        $data['user_id']=session('user_id');
        $data['type']=$this->config['BLOG_ITEM_TYPE_WORD'];
        $data['title']=$title;
        $data['desc_content']=$content;
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
        $data['path']=$path;
        $data['desc_content']=$desc;
        $data['tag']=$tag;
        $data['time']=$this->getTime();
        $this->model->add($data);
    }

    public function deletePicture($id){
        $this->model->delete($id);
    }

    public function addVideo($path,$desc,$tag,$embed_value){
        $data['user_id']=session('user_id');
        $data['type']=$this->config['BLOG_ITEM_TYPE_VIDEO'];
        $data['path']=$path;
        $data['desc_content']=$desc;
        $data['tag']=$tag;
        $data['time']=$this->getTime();
        $data['embed_value']=$embed_value;
        $this->model->add($data);
    }

    public function deleteVideo($id){
        $this->model->delete($id);
    }

    public function addLink($path,$desc,$tag){
        $data['user_id']=session('user_id');
        $data['type']=$this->config['BLOG_ITEM_TYPE_LINK'];
        $data['path']=$path;
        $data['desc_content']=$desc;
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
        $condition['$user_id']=$user_id;
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
    public function getAllFollowerBlog($limit){
        $data=$this->model->where('user_id in
        (select bfu.follow_user_id from blog_user bu ,blog_follow_user bfu where bu.id = bfu.user_id)')->order('time asc')->limit('0,'.$limit)->select();
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