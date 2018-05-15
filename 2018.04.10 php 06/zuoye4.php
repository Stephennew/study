<?php 
	
	
	/*var_dump($_POST);die();*/
	if ($_SERVER['REQUEST_METHOD']==='POST') {
		$a1=$_POST['num1']??'';
		$a2=$_POST['suan']??'';
		$a3=$_POST['num2']??'';
	}
	

	function calculate($num1,$operator,$num2){
		if ($_SERVER['REQUEST_METHOD']==='POST') {
			if ($num1=='' && $num2 =='') {
				return '两个数不能为空';
			}elseif($num1==''){
				return '第一个数不能为空';
			}elseif($num2==''){
				return '第二个数不能为空';
			}
			switch ($operator) {
				case '1':
					return $result=$num1+$num2;
					break;
				case '2':
					return $result=$num1-$num2;
					break;
				case '3':
					return $result=$num1*$num2;
					break;
				case '4':
					if ($operator=='4' && $num2=='0') {
						return'第二数不能为0';
					}
					return $result=$num1/$num2;
					break;
			}
		}
	}

	echo calculate($a1,$a2,$a3);
require_once 'zuoye4.html';
 ?>