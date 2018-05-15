<?php 

$database_name = $_GET['database_name']??'';

//1.连接数据库
$link=mysqli_connect('127.0.0.1','root','root',$database_name,3306)or die('error');
//2.准备sql
$sql = 'show tables';

//3.执行sql

$result=mysqli_query($link,$sql);

//4.判断对象结果集

if($result === 'false'){
	echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
}

//5.如果是查询语句,需要解析结果集

$rows=mysqli_fetch_all($result,2);
//var_dump($rows);
//6.关闭连接
mysqli_close($link);

require 'zuoye2.html';


 ?>
