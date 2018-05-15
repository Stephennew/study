<?php 


	function daxiao($arr){
		$a=count($arr);
		$da=$arr[0];
		//echo $da;
		$da1='';
		for ($i=1; $i <$a ; $i++) { 
			if($da<$arr[$i]){
				echo $da1=$arr[$i];
			}
		}
		//return $da1;

	}
	$arr =[2,3,5];
	echo daxiao($arr);

 ?>