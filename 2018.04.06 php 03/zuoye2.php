<?php 

	$a=$_POST;
	
	$yuwen=$a['fenshu1'];
	$math=$a['fenshu'];

	$c=($yuwen>60&&$math>60)?'及格':'不及格';
	echo $c;
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		
 	</title>
 </head>
 <body>
 	<form action="" method="post">
 		语文分数:<input type="text" name="fenshu1">
 		数学分数:<input type="text" name="fenshu">
 		<input type="submit" name="" value="提交">
 	</form>
 </body>
 </html>