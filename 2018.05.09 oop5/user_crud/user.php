<?php 
	require '../userModel.class.php';
	require '../config.php';
	require '../../publicUtil.php';

	$user=userModel::getIstance($userinfo['DB']); 
	//Util::dump($user);die;
	$act = $_GET['act']??'list';
	if($act == 'list'){
		$res=$user->getList();
		require 'html/user_list.html';
	}
	elseif ($act == 'add') {
		require 'html/user_add.html';
	}
	elseif ($act == 'add_save') {
		$user->addUser($_POST);
		Util::my_jump('添加成功',1,'?act=list');
	}
	elseif ($act == 'del') {
		$id=$_GET['id'];
		$user->del($id);
		Util::my_jump('删除成功!',1,'?act=list');
	}
	elseif ($act == 'edit') {
		$id=$_GET['id'];
		$row=$user->getOne($id);
		require 'html/user_edit.html';
	}
	elseif ($act == 'edit_save') {
		
		$user->updateUser($_POST);
		Util::my_jump('修改成功!',1,'?act=list');
	}



 ?>