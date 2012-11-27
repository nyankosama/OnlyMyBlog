<?php
/**
 * User: nekosama
 * Date: 12-11-26
 * Time: 下午3:03
 */

include dirname(__FILE__)."/../Ext/simple_html_dom.php";
include dirname(__FILE__)."/../Ext/VideoUrlParser.class.php";
class VideoCrawlerAction extends Action{
    public function crawler(){
        $url=$this->_get("video_url");
//        $url='http://v.youku.com/v_show/id_XNyMjE2.html';
        $html=file_get_html($url);
        if($html==false){
            echo json_encode(array('statue'=>'false'));
            return;
        }
        $info=VideoUrlParser::parse($url);
        $title_element=$html->find('#subtitle');
        $embed_element= $html->find('#link3');
        $title=$title_element[0]->plaintext;
        $img_path=$info['img'];
        $embed_html=$embed_element[0]->getAttribute('value');
        $info=array('statue'=>'true','title'=>$title,'img_path'=>$img_path,'embed_html'=>$embed_html);
        echo json_encode($info);
    }
}