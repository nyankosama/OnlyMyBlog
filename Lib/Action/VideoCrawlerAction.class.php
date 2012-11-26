<?php
/**
 * User: nekosama
 * Date: 12-11-26
 * Time: 下午3:03
 */
include "simple_html_dom.php";

class VideoCrawlerAction extends Action{
    public function crawler(){
//        $url=$this->_post("video_url");
        $url='http://v.youku.com/v_show/id_XNDY4MzAyMjE2.html';
        $html=file_get_html($url);
        foreach ( $html->find('span[id=subtitle]') as $element) {
            echo $element->src;
        }


        echo 'fuck';
    }
}