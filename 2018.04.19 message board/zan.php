<?php 
$id=$_GET['id'];
$zan = $_GET['zan'];

//1.连接数据库
$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die();

//2.准备sql

$sql = "update message set zan=$zan+1 where id='{$id}'";
//$sql = "update message  set zan=$zan+1 where id='{$id}'";

//3.执行sql
$result = mysqli_query($link,$sql);

//4.判断
if($result === false){
	echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	die;
}

//5.不是查询

//6.关闭连接
mysqli_close($link);

header('Location:list.php'); //延迟转向 也就是隔几秒跳转






 ?>