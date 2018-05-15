<?php


namespace Model;
use \Tools\MysqlDb;
use \Tools\Util;

class ManagerModel
{
    private $manager;
    private $error; //保存错误消息

    public function __construct()
    {
        $config = require './Public/config.php';
        $this->manager = MysqlDb::getInstance($config['db']); //共有的静态的创建对象的方法,不需要通过new ,直接类名::
    }

    public function  getError(){
        return $this->error;
    }

    public  function getList(){
        //准备sql
        $sql = "select * from manager";
        //执行sql
        return $this->manager->fetchAll($sql);
    }

    public function insert($data){
        if(empty($data['username'])){
            $this->error = '用户名为空';
            return false;
        }
        if(empty($data['email'])){
            $this->error = '邮箱为空';
            return false;

        }
        if(empty($data['password']) || strlen($data['password']) < 6){
            $this->error = '密码为空或者小于6';
            return false;
        }
        //判断密码与重复的密码是否一致
        if($data['password'] != $data['repassword']){
            $this->error = '密码与确认密码不一致';
            return false;
        }
        //密码加密
        $password = md5($data['password']);
        //添加时间
        $add_time = time();
        //准备sql
        $sql = "insert into manager (username,password,email,add_time) VALUES ('{$data['username']}','$password','{$data['email']}','$add_time')";

        //执行sql
        return $this->manager->excute($sql);
    }

    public function getOne($id){
        //准备sql
        //var_dump($id['id']);
        $sql = "select * from manager where id='{$id['id']}'";
        //执行sql
        return $this->manager->fetchRow($sql);
    }
    public function update($data){
        //用户名不能为空
        if(empty($data['username'])){
            $this->error = '用户名为空';
            return false;
        }
        //邮箱不能为空
        if(empty($data['email'])){
            $this->error = '邮箱为空';
            return false;
        }
        //旧密码不填写,密码不修改
        if(empty($data['oldpassword'])){
            //准备sql
            $sql = "update manager set username='{$data['username']}',email='{$data['email']}' WHERE id = '{$data['id']}'";
            //执行sql
        }else{
            //旧密码填写,修改密码
            if(!empty($data['oldpassword'])){
                //新密码不能为空
                if(empty($data['password']) || strlen($data['password'])<6) {
                    $this->error = '新密码为空或者不能小于6位';
                    return false;
                }

                //判断确认密码与新密码一致
                if($data['password'] != $data['repassword']){
                    $this->error = '新密码与确认密码不一致';
                    return false;
                }

                //旧密码与数据库密码一致
                //准备sql
                $sql = "select password from manager WHERE id={$data['id']}";
                //执行sql
                $db_password = $this->manager->fetchColumn($sql);
                $old_password = md5($data['oldpassword']);
                if($db_password != $old_password){
                    $this->error = '旧密码错误';
                    return false;
                }
                //密码加密
                $password = md5($data['password']);
                //新密码不能与数据库的旧密码一致
                if($password == $db_password){
                    $this->error = '新密码不能与旧密码一致';
                    return false;
                }
            }
            //添加时间
            $add_time = time();
            //准备sql
            $sql = "update manager set 
                username='{$data['username']}',
                password='$password',
                email='{$data['email']}',
                add_time='$add_time'
                WHERE id='{$data['id']}'";

        }
        //执行sql
        return $this->manager->excute($sql);
    }
    public function del($id){
        //准备sql
        $sql = "delete from manager WHERE id='{$id['id']}'";
        //执行sql
        $this->manager->excute($sql);
    }
    public function check($data){

        //准备sql
            //根据用户名查找一条用户数据
        $sql = "select * from manager WHERE username='{$data['username']}'";
        //执行sql
        $res = $this->manager->fetchRow($sql);
        //判断是否有用户信息
        if(empty($res)){
           $this->error = "用户名不存在!";
           return false;
        }
        //如果有用户数据,将传入的密码与数据库里面的面进行比对
        if(md5($data['password']) != $res['password']){
           $this->error = "密码错误";
           return false;
        }


    }
}