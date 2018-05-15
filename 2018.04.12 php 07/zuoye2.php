<?php 
	
	$student = [

		['吴文强',22,'男'],
		['廖天宇',23,'男'],
		['肖元',27,'男'],
		['王海桃',24,'男']

	];



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		table,th{
 			border: 1px solid black;
 			border-collapse: collapse;
 			width: 500px;
 		}
 		td{
 			border:1px solid black;
 			
 		}


 	</style>
 	
 </head>
 <body>
 	<table>
 		<th>姓名</th>
 		<th>年龄</th>
 		<th>性别</th>
 		<?php foreach ($student as $value):?>
 			<tr>
	 			<td><?=$value[0]?></td>
	 			<td><?=$value[1]?></td>
	 			<td><?=$value[2]?></td>
 			</tr>
 		<?php endforeach ?>
 		
 	</table>
 </body>
 </html>