<?php 

	
	$a = 1;
	$b = 2;
	$c = 8;

	echo $c = $a++ + $b;  //3 后置++ 会在算数运算符执行完毕之后,再次使用才加+1
	echo $c = $a-- + $b; //4  再次使用$a 变量,先执行后置++



 ?>