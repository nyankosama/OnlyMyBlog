<?php
/**
 * User: nekosama
 * Date: 12-11-27
 * Time: 上午8:56
 */
class PictureAction extends Action{
    public function fileupload(){
        require(dirname(__FILE__)."/../Ext/UploadHandler.php");
        $upload_handler = new UploadHandler();
    }
}