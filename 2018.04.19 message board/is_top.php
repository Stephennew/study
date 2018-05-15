<?php 

$id=$_GET['id'];
$is_top=$_GET['is_top'];

$is_top=$is_top?0:1;
//1.连接数据库

$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('连接数据库失败');

//2.准备sql
$sql = "update message set is_top='{$is_top}' where id='{$id}'";

//3.执行sql

$result=mysqli_query($link,$sql);

//4.判断
if($result === false){
	echo '错误sqL:',$sql,'<br>','错误信息:',mysqli_error($link);
	die();
}
//5 不是查询语句

//6 关闭连接
mysqli_close($link);

//echo '置顶成功!';
header('Refresh: 0; url=list.php'); //延迟转向 也就是隔几秒跳转

 ?>