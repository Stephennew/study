<?php


namespace Controller;

use Model\ManagerModel;
use Tools\Util;
use Model\UsersModel;

class LoginController extends AuthController
{

    public function index(){
        require './View/Login/login.html';
    }
    public function check(){
       //接收数据
        //处理数据
        $re = $this->auth($_POST);
        if($re == 1){ //'1'代表管理员
            $manager = new ManagerModel();
            $res = $manager->check($_POST);
            if($res === false){
                Util::my_jump($manager->getError(),1,'index.php?c=Login&a=index');
            }
        }elseif ($re == 2){ //'2'代表会员用户
            $users = new UsersModel();
            $res = $users->check($_POST);
            if($res === false){
                Util::my_jump($users->getError(),1,'index.php?c=Login&a=index');
            }
        }
        //验证失败,处理错误信息

        //显示页面
        //说明验证通过
        //保存登录信息到cookie中
        //setcookie('isLogin','yes',time()+1,'/','.shop.com'); name,value,time,path,domain name

        //保存登录信息到session中,其他页面需要验证登录后才可访问
        $_SESSION['isLogin']='yes';
        //跳转到后台首页
        Util::jump('index.php?c=Index&a=index');
    }
}