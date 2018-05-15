<?php 


//1. 连接数据库
$link=mysqli_connect('127.0.0.1','root','root','shop',3306)or die('error');
//2.准备sql
$sql = 'show databases';

//3.执行sql 

$result=mysqli_query($link,$sql);

//4.判断执行是否出错
if($result === 'false'){
	echo '错误sql:',$sql,'错误信息:',mysqli_error($link);
	die();
}
//5.查询语句,需要解析
$rows=mysqli_fetch_all($result,2);
//var_dump($row);die;
//6. 关闭连接
mysqli_close($link);

require 'zuoye1.html';
?>

