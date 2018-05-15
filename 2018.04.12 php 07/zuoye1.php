<?php 
	
	$arr = ['name'=>'张三','age'=>33,'gender'=>'男','class'=>'php1120'];


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		table{
 			border:1px solid black;
 			width: 200px;
 		}
 		
 	</style>
 </head>
 <body>
 	<table>
 		<tr>
 			<td>姓名</td>
 			<td><?=$arr['name']?></td>
 		</tr>
 		<tr>
 			<td>年龄</td>
 			<td><?=$arr['age']?></td>
 		</tr>
 		<tr>
 			<td>性别</td>
 			<td><?=$arr['gender']?></td>
 		</tr>
 		<tr>
 			<td>班级</td>
 			<td><?=$arr['class']?></td>
 		</tr>
 		
 	</table>
 </body>
 </html>