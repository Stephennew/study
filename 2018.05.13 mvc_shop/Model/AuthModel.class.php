<?php


namespace Model;

use \Tools\MysqlDb;
class AuthModel
{
    private $error;//保存错误信息
    public function auth($data){
        //判断是否选择用户类型
        if(empty($data['user_type_id'])){
            $this->error = '必须选择用户类型!';
            return false;
        }
        //准备sql
        $sql = "select user_type_id from user_type WHERE user_type_id = '{$data['user_type_id']}'";
        //执行sql
        $config = require './Public/config.php';
        $db = MysqlDb::getInstance($config['db']);
        return $db->fetchColumn($sql);
    }
    public  function getError(){
        return $this->error;
    }
}