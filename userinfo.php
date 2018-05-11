<?php 

$s=$_POST;
/*var_dump($s['hobby']);
exit;*/
/*$_POST*/
/*var_dump($s['hobby']);*/
var_dump("名字:".$s['name'].'<br>'
	."密码:".$s['pwd'].'<br>'
	."正在学习课程:".$s['course'].'<br>'
	."爱好:".print_r($s['hobby']).'<br>'
	."所在城市:".$s['city'].'<br>'
	."个人介绍:".$s['userinfo']);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>userinfo</title>
 </head>
 <body>
 	<form action="" method="post">
 		姓名:<input type="text" name="name"><br/>
 		密码:<input type="password" name="pwd"><br/>
 		正在学习课程:<label><input type="radio" name="course" value="C">C</label>
 					<label><input type="radio" name="course" value="C#">C#</label>
 					<label><input type="radio" name="course" value="PHP">PHP</label>
 					<label><input type="radio" name="course" value="JAVA">JAVA<br/></label>
 		爱好: 篮球<input type="checkbox" name="hobby[]" value="篮球">	
 			足球<input type="checkbox" name="hobby[]" value="足球">
 			棒球<input type="checkbox" name="hobby[]" value="棒球"><br/>
 		所在城市:<select name="city">
 					<option value="1">成都</option>
 					<option value="2">重庆</option>
 					<option value="3">达州</option>
 				</select><br/>
 		个人介绍:<textarea cols="40" rows="10" name="userinfo"></textarea>
 		<input type="submit" name="" value="提交">
 	</form>
 </body>
 </html>