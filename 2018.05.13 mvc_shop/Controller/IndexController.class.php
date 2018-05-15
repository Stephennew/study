<?php


namespace Controller;
use Tools\Util;

class IndexController extends PlatformController
{
    //展示后台首页
    public function index(){
      /*  //验证cookie中是否有登录信息
        if(!isset($_COOKIE['isLogin']) || $_COOKIE['isLogin'] != 'yes'){
            //没有表示没有登录,跳转到登录页面
            Util::my_jump('您没有登录',1,'index.php?c=Login&a=index');
        }*/
        //接收数据
        //处理数据
        //显示页面
        require './View/Index/index.html';
    }
    public function top(){
        //接收数据
        //处理数据
        //显示页面
        require './View/Index/top.html';
    }
    public function  main(){
        //接收数据
        //处理数据
        //显示页面
        require './View/Index/main.html';
    }
    public function menu(){
        //接收数据
        //处理数据
        //显示页面
        require './View/Index/menu.html';
    }
}