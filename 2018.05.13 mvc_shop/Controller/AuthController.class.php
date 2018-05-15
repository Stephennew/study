<?php


namespace Controller;
use \Model\AuthModel;
use \Tools\Util;
class AuthController
{

    public function auth($data){
        //接收数据
        //处理数据
        $auth = new AuthModel();
        $re = $auth->auth($data);
        if($re === false){
            Util::my_jump($auth->getError(),1,'index.php?c=Login&a=index');
        }
        return $re;
        //显示页面
    }
}