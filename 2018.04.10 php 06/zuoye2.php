<?php 

	function concat(){

		$args=func_get_args();
		$num = func_num_args();
		$a='';
		for ($i=0; $i < $num; $i++) { 
			
			$a.=$args[$i];
		}
		return $a;

	}

	$content=concat('一个','网吧','玩','吃鸡','好开心');
	echo $content;
 ?>