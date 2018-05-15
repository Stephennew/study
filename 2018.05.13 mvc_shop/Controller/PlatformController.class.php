<?php


namespace Controller;
use \Tools\Util;
/*平台统一验证控制器,所有需要登录才可访问的页面都需要验证*/
class PlatformController
{
   public function __construct()
   {
       if($this->checkLogin() === false) {

           Util::my_jump('您没有登录,请先登录!', 1, 'index.php?c=Login&a=index');
       }
   }
    private function checkLogin()
    {
        //验证$_SESSION中是否有登录信息
        if(empty($_SESSION['isLogin']) || $_SESSION['isLogin'] != 'yes'){
            //没有表示没有登录,跳转到登录页面
            return false;
        }
    }

}