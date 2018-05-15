<?php


namespace Controller;


class UserController{
    private $user;
    public function __construct()
    {
        $this->user = new \Model\UserModel();
    }

    public function index()
    {

        $rows = $this->user->getList();
        require './View/User/user_index.html';
    }
    public function add_save()
    {
        if(!empty($_POST)) {
            $this->user->addUser($_POST);
            \Tools\Util::my_jump('添加成功!', 1, '?a=index');
        }
        require './View/User/user_add.html';
    }
   public function edit_save()
   {
        if(!empty($_POST)){
            $this->user->updateUser($_POST);
            \Tools\Util::my_jump('更新成功!',1,'?a=index');
        }
       $row = $this->user->getOne($_GET);
       require './View/User/user_edit.html';
   }
   public  function del()
   {
       $this->user->delete($_GET);
       \Tools\Util::my_jump('删除成功!',1,'?a=index');
   }
}