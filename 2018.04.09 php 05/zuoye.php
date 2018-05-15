<?php
require_once'form.html'; 
 $userinfo=require_once 'peizhi.php';
/* var_dump($userinfo);*/
/*var_dump($_POST);*/
$a=$_POST;
/*var_dump($_SERVER['REQUEST_METHOD']);
die();*/
if ($_SERVER['REQUEST_METHOD']=='POST') {

	if(empty($a['username'])){
	echo '用户名不能为空!,请重新填写!';
	}elseif(strlen($a['pwd'])<6){
		echo '密码必须大于6位数';
	}elseif ($userinfo['username'] ===$a['username'] && $userinfo['pwd'] === $a['pwd']) {
		echo '登录成功';
	}else{
		echo '账号密码错误';
	}
}


?>
