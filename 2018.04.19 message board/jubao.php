<?php 

$id=$_GET['id'];
//1.连接数据库
$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('数据库连接失败');
//2.准备sql
$sql = "update message set jubao=jubao+1 where id='{$id}'";

//3.执行sql

$result=mysqli_query($link,$sql);
//4.判断

if($result === false){
	echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	die();
}

//5.是否是查询语句


//6.关闭连接
mysqli_close($link);
header('Refresh: 0; url=list.php'); //延迟转向 也就是隔几秒跳转










 ?>
