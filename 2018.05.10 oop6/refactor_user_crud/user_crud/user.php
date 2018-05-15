<?php
    require '../../publicUtil.php';
    require '../userModel.class.php';
    $user = new userModel();
    $a = $_GET['a']??'index';
    if($a == 'index'){
        $rows = $user->getList();
        require 'html/user_index.html';
    }
    elseif ($a == 'add'){
        require 'html/user_add.html';
    }
    elseif ($a == 'add_save'){
       $user->addUser($_POST);
       Util::my_jump('添加成功!',1,'?a=index');
    }
    elseif ($a == 'edit'){
        $row = $user->getOne($_GET);
        require 'html/user_edit.html';
    }
    elseif ($a == 'edit_save'){
        $user->updateUser($_POST);
        Util::my_jump('更新成功!',1,'?a=index');
    }
    elseif ($a = 'del'){
        $user->delete($_GET);
        Util::my_jump('删除成功!',1,'?a=index');
    }
