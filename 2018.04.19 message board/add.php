<?php 
extract($_POST);

//1.连接数据库
$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('error');
//2.准备sql

$add_date=time();
/*$sql = "insert into message (name,date,content) value(null,'$name','$add_date','$content')";*/
$sql ="insert into message set name='{$name}',date='{$add_date}',content='{$content}'";
//var_dump($sql);die();
//3.执行sql
$result=mysqli_query($link,$sql);
//var_dump($result);die();
//4.判断是否执行成功
if($result === false){
	echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	die();
}

//5.是否是查询语句,是的话解析结果集

//6关闭连接
mysqli_close($link);
//echo '留言成功';
header('Refresh: 0; url=list.php'); //延迟转向 也就是隔几秒跳转

 ?>