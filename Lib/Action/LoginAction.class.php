<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nekosama
 * Date: 12-11-12
 * Time: 下午11:43
 * To change this template use File | Settings | File Templates.
 */

class LoginAction extends Action{
    private $conf;

    function  LoginAction(){
        $this->conf=require('ActionConfig.php');
    }

    public function test(){
        echo 'fuck';
    }

    public function login(){
        $this->display('Login:login');
//        if(cookie('user_id')!=null){
//            session('user_id',cookie('user_id'));
//            header('location:'.$this->conf['APP_ROOT'].'Home/home');
//        }else{
//            $this->display('Login:login');
//        }

    }

    /**
     * 登录验证
     */
    public function loginCheck(){
        $name= $this->_post('name');
        $password=$this->_post('password');

        $user=M('user');
        $condition['name']=$name;
        $data = $user->where($condition)->select();
        if($data){
            if($data[0]['password']==$password){
                //验证成功
                session('user_id',$data[0]['id']);
                cookie('user_id',$data[0]['id'],3600);

                //$this->display('Home:hometest');
                //$this->display('Home:home');
                header('location:'.$this->conf['APP_ROOT'].'Home/home');
            }else{
                //密码错误
                $message='对不起，您的密码错误！';
                $this->assign('message',$message);
                $this->display('Login:loginFail');
            }
        }else{
            //用户名不存在
            $message='对不起，用户名不存在！';
            $this->assign('message',$message);
            $this->display('Login:loginFail');
        }
    }

    public function logOut(){
        session('loginSession',null);
        $this->display('Index:index');
    }
}