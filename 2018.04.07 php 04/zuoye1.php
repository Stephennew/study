<?php 

$value=$_POST;
/*var_dump(strlen($value['pwd']));
exit;*/

//var_dump($value);
if(empty($value['username'])){
	echo '用户名不能为空,请输入用户名!';
}elseif((strlen($value['pwd']))<=6){
	echo '密码必须大于6位数!';
}else{
	echo '登录成功!';
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		
 	</title>
 </head>
 <body>
 	<form action="" method="post">
 		用户名:<input type="text" name="username">
 		密码:<input type="password" name="pwd">
 		<input type="submit" name="" value="登录">
 	</form>
 </body>
 </html>