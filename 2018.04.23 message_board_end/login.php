<?php
$act=$_GET['act']??'login';
if($act == 'login'){

	require 'html/login.html';

}elseif($act== 'login_access'){
	$username=$_POST['username'];
	$pwd = $_POST['pwd'];
	$link=@mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('数据库连接失败');
	$sql = "select * from user where username='{$username}'";
	$result=mysqli_query($link,$sql);
	if($result == false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die;
	}
	$row=mysqli_fetch_assoc($result);
	if(empty($row)){
		echo '该用户不存在,请重新登录';
		header('Refresh: 1; url=login.php?act=login'); //延迟转向 也就是隔几秒跳转
		die;
	}
	if($row['pwd'] != $pwd){
		echo '用户名或者密码错误,请重新登录!';
		header('Refresh: 1; url=login.php?act=login');
		die;
	}
	
	$_SESSION['userinfo']=$row;
	echo '登录成功!';
	header('Refresh: 1; url=condition.php?act=list');
}elseif($act == 'sign_in'){

	require 'html/sign_in.html';

}elseif($act == 'signin'){

	extract($_POST);
	if($username == '' && $pwd == '' && $nickname == ''){
		echo '不能为空!';
		header('Refresh: 1; url=login.php?act=sign_in');
		die;

	}elseif($username == ''|| is_numeric($username)){
		echo '用户名不能为空或者数字!';
		header('Refresh: 1; url=login.php?act=sign_in');
		die;
	}elseif($pwd == ''){
		echo '密码不能为空!';
		header('Refresh: 1; url=login.php?act=sign_in');
		die;
	}elseif($nickname ==''|| is_numeric($nickname)){
		echo '昵称不能为空或者数字!';
		header('Refresh: 1; url=login.php?act=sign_in');
	}
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('连接数据失败');
	$sql = "insert into user set username='{$username}',pwd='{$pwd}',nickname='{$nickname}'";
	$result=mysqli_query($link,$sql);
	if($result == false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}

	echo '注册成功!';
	header('Refresh: 1; url=login.php?act=login');

}elseif ($act == 'logout') {
	unset($_SESSION['userinfo']);
	echo '退出成功!';
	header('Refresh: 1; url=condition.php?act=list');
}



 ?>