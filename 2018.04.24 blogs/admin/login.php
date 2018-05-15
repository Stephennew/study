<?php 
require '../../public.php';
$act=$_GET['act']??'login';
$link=my_conn('blogs');
if($act == 'login'){
	require 'html/login.html';
}
elseif ($act == 'login_check') {
	extract($_POST);
	$sql = "select * from manager where username = '{$username}'";
	$result=my_query($link,$sql);
	$rows=my_fetch_assoc($result,1);
	if(empty($rows)){

		my_jump('用户名不存在!',1,'login.php?act=login');
	}
	if($rows['pwd'] != $pwd){

		my_jump('用户名或者密码错误!',1,'login.php?act=login');
	}
	$id = $rows['id'];

	$to_id = $rows['to_id'];
	$sql1 = "select * from manager_group where id = '$to_id'";
	$result1=my_query($link,$sql1);
	$manager_group=my_fetch_assoc($result1);
	$rows['manager_group']=$manager_group;


	$_SESSION['userinfo']=$rows;

	$last_time = time();
	$remote_addr = $_SERVER['REMOTE_ADDR'];
	$sql = "update manager set last_time='$last_time',remote_addr='$remote_addr' where id ='$id'";
	my_query($link,$sql);

	jump('article.php?act=article_list');
	
}
elseif ($act == 'logout') {
	unset($_SESSION['userinfo']);
	jump('?act=login');
}






 ?>