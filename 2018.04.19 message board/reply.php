<?php 
if($_SERVER['REQUEST_METHOD']=='GET'){
	$p_id=$_GET['id'];

	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('连接数据库失败');
	//2.准备sql

	$sql = "select * from message where id='{$p_id}'";

	//3.执行sql

	$result=mysqli_query($link,$sql);

	//4.判断
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	}

	//5.是查询语句,解析结果集

	$row=mysqli_fetch_assoc($result);
	require 'html/huixian_reply.html';
	//6.关闭连接
	mysqli_close($link);

	require 'html/reply.html';

}elseif($_SERVER['REQUEST_METHOD']=='POST'){

	extract($_POST);

	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('连接数据库失败');
	//2.准备sql
	$create_time=time();

	//$sql = "insert into reply set (name,create_time,reply_content,p_id) values('$name','$create_time','$reply_content','$p_id')";

	$sql = "insert into reply set name='{$name}',create_time='{$create_time}',reply_content='{$reply_content}',p_id='{$p_id}'";
	//3.执行sql

	$result=mysqli_query($link,$sql);

	//4.判断
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	}

	//5.不是查询语句,无解析结果集

	//$row=mysqli_fetch_assoc($result);
	//require 'html/huixian_reply.html';
	//6.关闭连接
	mysqli_close($link);

	//require 'html/reply.html';
	header('Refresh: 0; url=list.php'); //延迟转向 也就是隔几秒跳转
}

 ?>