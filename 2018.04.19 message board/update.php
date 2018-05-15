<?php 

if($_SERVER['REQUEST_METHOD']==='GET'){
	$id=$_GET['id'];
	//echo $id;
	//1. 连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('数据库连接失败');
	//2.准备sql
	$sql = "select * from message where id='{$id}'";

	//3.执行sql

	$result=mysqli_query($link,$sql);

	//4.判断结果集

	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}
	//5. 是否是查询语句,是解析结果集
	$row=mysqli_fetch_assoc($result);


	require 'html/update.html';

}elseif($_SERVER['REQUEST_METHOD']==='POST'){

	extract($_POST);
	//1. 连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('数据库连接失败');
	//2.准备sql
	$add_date=time();
	$sql = "update message set name='{$name}',date='{$add_date}',content='{$content}' where id='{$id}'";

	//3.执行sql
	$result=mysqli_query($link,$sql);
	//4.判断结果集
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}
	//5.是否是查询语句

	echo '更新成功!';
	header('Resfresh:1;url=list.php'); //延迟转向 也就是隔几秒跳转

}

//6.关闭连接
mysqli_close($link);








 ?>