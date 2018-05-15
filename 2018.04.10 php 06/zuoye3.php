<?php 
	require_once 'zuoye3.html';
	$a=$_POST;
	/*echo '<pre>';
	var_dump($_SERVER);die();*/
	/*var_dump($a);die();*/
	function func_str($str1,$str2,$str3){
		if($_SERVER['REQUEST_METHOD']==='POST'){
			return $str1.$str2.$str3;
		}
	}
	echo func_str($a['str1']??'',$a['str2']??'',$a['str3']??'');
 ?>