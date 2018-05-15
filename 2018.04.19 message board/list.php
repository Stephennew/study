<?php 
//header('Content-Type: text/html;charset=utf-8');
	
/*
创建数据库

创建表
create table(
	id int 
);

添加数据

*/
require 'html/list.html';

//1.连接数据库
$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('error');
//2.准备sql
$sql = 'select * from message order by is_top desc,id desc';


//3.执行sql

$result=mysqli_query($link,$sql);

//4.判断是否对象结果集
if($result === 'false'){
	echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
}
//5.查看是否是查询语句,是的话需要解析结果集

$rows=mysqli_fetch_all($result,1);

/*
	回复内容
*/
/*$sql1 = "select * from reply where id={$row['id']} order by id desc";
$result1=mysqli_query($link,$sql1);
if($result1 === false){
	echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
}
$rows1=mysqli_fetch_all($result1,1);*/
//6关闭连接


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		table{
 			border-collapse:1px solid red;
 		}
 	</style>
 </head>
 <body>
 	<table>
 	<hr>
	<?foreach($rows as $row):?>
	<?$add_date = date('Y-m-d H:i:s',$row['date']);?>
	<?

		if($row['jubao']>0){
			echo '您的评论正在审核中!','<br>';
		}else{
		

	?>

	<p><?=$row['id']?>#<?=$row['name']?>于<?=$add_date?>说:</p>
	<p>	<?=$row['content']?>
		<a href="del.php?id=<?=$row['id']?>">删除</a>
		<a href="update.php?id=<?=$row['id']?>">修改</a>
		<a href="is_top.php?id=<?=$row['id']?>&is_top=<?=$row['is_top']?>"><?=$row['is_top']?'取消置顶':'置顶'?></a><a href="zan.php?id=<?=$row['id']?>&zan=<?=$row['zan']?>">赞(<?=$row['zan']?>)</a>
		<a href="jubao.php?id=<?=$row['id']?>">举报</a>
		<a href="reply.php?id=<?=$row['id']?>">回复</a>
		<!-- 
			reply start
		 -->
		<?php
		//$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('error');
		$sql = "select * from reply where p_id={$row['id']}";
		$result=mysqli_query($link,$sql);
		if($result === false){
			echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
			die();
		}
		$rows=mysqli_fetch_all($result,1);
		
		foreach($rows as $v):

		?>
		<?$reply_time = date('Y-m-d H:i:s',$v['create_time']);?>
		<p style="border:1px solid red;width: 700px"><?=$v['name']?>在<?=$reply_time?>回复:<?=$v['reply_content']?></p>
		<?endforeach;?>
		<!-- 
			reply end
		 -->
	</p>
	<?}?>
	<?endforeach;?>
 	</table>

 	<?php mysqli_close($link)?>;
 </body>
 </html>