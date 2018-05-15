<?php 
/**
	连接数据库
*/
	function my_conn($data_name){
		return $link=mysqli_connect('127.0.0.1','root','root',$data_name,3306)or die('error');
	}

/*
	判断结果集

*/
	function my_result($result,$sql,$link){
		if($result === false){
			return '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
			die;
		}
	}


/*
	
	返回一个一维关联数组(只取了一条记录)
*/
	function my_assoc($result){
		return mysqli_fetch_assoc($result);
	}

/*
	返回一个一维索引数组(只取一天记录)

*/
	function my_row($result){
		return mysqli_fetch_row($result);
	}

/*
	返回结果对象
	
*/
	function my_all($result,$num){
		return mysqli_fetch_all($result,$num);
	}