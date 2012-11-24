<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action
{
    public function index()
    {
//        if (cookie('user_id')!=null){
//            //如果用户已成功登录
//            $this->display('Home:home');
//        }else{
//
//        }
        //test
        header('location:'.$this->conf['APP_ROOT'].'Login/login');
    }
}