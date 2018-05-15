<?php


namespace Model;
use \Tools\Util;
use \Tools\MysqlDb;

class UsersModel
{
    private $users;
    private $error;

    public function __construct()
    {
        $config = require './Public/config.php';
        $this->users = MysqlDb::getInstance($config['db']);
    }

    public function getError()
    {
        return $this->error;
    }

    public function getList()
    {
        //准备sql
        $sql = "select * from user";
        //执行sql
        return $this->users->fetchAll($sql);
    }

    public function insert($data)
    {
        //用户名不能为空
        if (empty($data['username'])) {
            $this->error = '用户名不能为空!';
            return false;
        }
        //会员邮箱不能为空
        if (empty($data['email'])) {
            $this->error = "邮箱不能为空!";
            return false;
        }
        //密码不能为空,长度需要大于6位
        if (empty($data['password']) || strlen($data['password']) >=6 || strlen($data['password']) <= 12) {
            $this->error = '密码不能为空或者大于6等于位或者密码小于等于12位!';
            return false;
        }
        //确认密码与登录密码需要一致
        if ($data['password'] != $data['repassword']) {
            $this->error = '登录密码与确认密码不一致!';
            return false;
        }
        //用户状态不能为空
        if(!isset($data['status'])){
            $this->error = '用户状态不能为空!';
            return false;
        }
        //准备sql
        //密码加密
        $password = md5($data['password']);
        //用户状态
        //$status = $status??0;
        //注册时间
        $add_time = time();
        $sql = "insert into user (username,password,email,status,add_time) VALUES (
                '{$data['username']}',
                '$password',
                '{$data['email']}',
                '{$data['status']}',
                '$add_time')";
        //执行sql
        $this->users->excute($sql);
    }

    public function update($data)
    {
        //用户名不能为空
        if (empty($data['username'])) {
            $this->error = '用户名不能为空!';
            return false;
        }
        //邮箱不能为空
        if (empty($data['email'])) {
            $this->error = '邮箱不能为空!';
            return false;
        }
        //旧密码不填写
        if (empty($data['oldpassword'])) {
            //准备sql
            $sql = "update user set 
                    username = '{$data['username']}',
                    email = '{$data['email']}'";
        } else {
            //旧密码填写
            //新密码不能为空,密码位数需要大于6位
            if (empty($data['password']) || strlen($data['password']) >= 6 || strlen($data['']) <= 12) {
                $this->error = '新密码不能为空或者新密码不能小于6位数!';
                return false;
            }
            //新密码与确认密码一致
            if ($data['password'] != $data['repassword']) {
                $this->error = '新密码与确认密码不一致!';
            }
            //准备sql 查询数据库的密码是否与填写的旧密码一致,一致才可以修改
            $old_password = md5($data['oldpassword']);
            $sql = "select password from user WHERE password = '$old_password'";
            $db_password = $this->users->fetchColumn($sql);
            //就密码需要与数据库的密码一致
            if ($old_password != $db_password) {
                $this->error = '旧密码错误!';
                return false;
            }
            //新密码不能与旧密码一致
            $password = md5($data['password']);
            if ($password == $old_password) {
                $this->error = '新密码不能与旧密码一致!';
                return false;
            }
            // $password = md5($data['password']);
            $status = $satus??0;
            //准备sql
            $sql = "update user set 
                username = '{$data['username']}',
                email = '{$data['email']}',
                password = '$password',
                status = '$status'
                WHERE id = '{$data['id']}'";
        }
        //执行sql
        $this->users->excute($sql);
    }

    public function getOne($id)
    {
        //准备sql
        $sql = "select * from user WHERE id='{$id['id']}'";
        //执行sql
        return $this->users->fetchRow($sql);
    }

    public function del($id)
    {
        //准备sql
        $sql = "delete from user where id={$id['id']}";
        //执行sql
        $re = $this->users->excute($sql);
    }

    public function check($data)
    {
        //准备sql
        $sql = "select * from user WHERE username = '{$data['username']}'";
        //执行sql
        $row = $this->users->fetchRow($sql);
        //判断用户名是否存在
        if(empty($row)){
            $this->error = '用户名不存在!';
            return false;
        }
        //判断传入的密码是否与数据的密码一致
        $password = md5($data['password']);
        if($password != $row['password']){
            $this->error = '密码错误!';
            return false;
        }
        //用户名,密码,验证通过后才可以写入以下信息
        //最后登录IP
        $last_login_ip = ip2long($_SERVER['SERVER_ADDR']);
        //最后登录时间
        $last_login_time = time();
        //准备sql
        $sql = "update user set 
                last_login_time = '{$last_login_time}',
                last_login_ip = '{$last_login_ip}' 
                WHERE id='{$row['id']}'";
        //执行sql
        $re = $this->users->excute($sql);

    }
}