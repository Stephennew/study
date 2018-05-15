<?php 
	require '../../public.php';
	$act=$_GET['act']??'';
	$link=my_conn('blogs');
	if(!isset($_SESSION['userinfo'])){
		my_jump('您没有登录,请先登录!',1,'login.php?act=login');
	}
	if($act == 'manager_list'){
		$sql1 = "select * from manager_group";
		$result1=my_query($link,$sql1);
		$row=my_fetch_all($result1,1);
		foreach ($row as $val) {
			$arr[$val['id']]=$val['group_name'];
		}
		$sql = "select * from manager";
		$result=my_query($link,$sql);
		$rows=my_fetch_all($result,1);
		require 'html/manager_list.html';
	}
	elseif ($act == 'manager_add') {
		$sql = "select * from manager_group";
		$result=my_query($link,$sql);
		$rows=my_fetch_all($result,1);
		require 'html/manager_add.html';
	}
	elseif ($act == 'manager_add_save') {
		extract($_POST);
		$create_time=time();
		$to_id = 1;
		
		if(empty($username) && empty($pwd) && empty($email) && empty($nickname)){
			my_jump('用户名密码不能为空',1,'manager.php?act=manager_add');
		}elseif(empty($username)){
			my_jump('用户名不能为空!',1,'manager.php?act=manager_add');
		}elseif (is_numeric($username)) {
			my_jump('用户名不能为数字',1,'manager.php?act=manager_add');
		}


		$sql = "insert into manager set username='{$username}',pwd='{$pwd}',email='{$email}',nickname='{$nickname}',create_time='{$create_time}',to_id='{$to_id}'";
		my_query($link,$sql);
		jump('?act=manager_list');
	}
	elseif ($act == 'manager_edit') {
		extract($_GET);
		$sql = "select * from manager where id='{$id}'";
		$result=my_query($link,$sql);
		$row=my_fetch_assoc($result);

		$sql1 = "select * from manager_group";
		$result1=my_query($link,$sql1);
		$rows = my_fetch_all($result1,1);
		

		require 'html/manager_edit.html';
	}
	elseif ($act == 'manager_edit_save') {
		extract($_POST);
		$to_id=1;
		$create_time=time();
		$sql = "update manager set username='$username',pwd='$pwd',email='$email',nickname='$nickname',create_time='$create_time',to_id='$to_id' where id ='$id'";
		my_query($link,$sql);
		jump('?act=manager_list');
	}
	elseif ($act == 'manager_del') {
		extract($_GET);
		$sql = "delete from manager where id = '$id'";
		my_query($link,$sql);
		my_jump('删除成功',1,'?act=manager_list');
	}
	mysqli_close($link);
