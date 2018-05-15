<?php 

/*var_dump($_POST);*/
/*$a = (1>0) ? "zhen" : 'jia';
var_dump($a);
exit;*/
$number=$_POST['is_numerics']??'';

$a=is_numeric($number)?"你输入的值是一个数字":"不是数字";

echo $a;


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>is_numeric</title>
 </head>
 <body>
 	<form action="" method="post">
 		请输入需要检测字符串:
 		<input type="text" name="is_numerics"> 		
 		<input type="submit" name="" value="检测">
 	</form>
 </body>
 </html>