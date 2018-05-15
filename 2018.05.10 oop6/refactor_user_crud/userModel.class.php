<?php
class userModel{
    private $user; //user对象
    public function __construct(){
        require 'MysqlDb.class.php';
        $config=require 'config.php';
        $this->user = MysqlDb::getInstance($config['DB']);
    }
    public function getList(){
        $sql = "select * from user";
        return $this->user->fetchAll($sql);
    }
    public function addUser($data){
        extract($data);
        $status = $status??0;
        $sql = "insert into user VALUES (null,'$username','$password','$email','$status')";
        $this->user->excute($sql);
    }
    public function  getOne($id){
        extract($id);
        $sql = "select * from user WHERE id='$id'";
        return $this->user->fetchRow($sql);
    }
    public function updateUser($data){
        extract($data);
        $status=$status??0;
        $sql = "update user set username='$username',password='$password',email='$email',status='$status' WHERE id='$id'";
        $this->user->excute($sql);
    }
    public function delete($id){
        extract($id);
        $sql = "delete from user WHERE id='$id'";
        $this->user->excute($sql);
    }
}