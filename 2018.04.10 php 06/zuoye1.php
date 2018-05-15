<?php 

	function jiecheng($num){
		
		if($num<=0){
			echo "0的阶乘为1";
		}else{
		$j=1;
		for ($i=1; $i <= $num; $i++) { 
			$j*=$i;
		}
			
		}
		return  $j;
		

	}
	echo jiecheng(5);
 ?>