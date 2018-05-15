<?php 
	function bijiao($n,$arr3){
		for ($i=0; $i < count($arr3); $i++) { 
			if ($n==$arr3[$i]) {
				return true;
			}
		}
		return false;
	}

	$arr4 = [1,2,3];
	echo bijiao(3,$arr4);


	$a=range(1,50,5);
	var_dump($a);

	echo '<hr>';
	
	function shuzu($low,$height,$step=''){
		$arra=[];
		var_dump($step);
		for ($low=$low;$low <= $height;) {  //优化之后
			$arra[] =$low;
			$step?$low+=$step:$low++;
		}

	/*	if (empty($step)) {
			for ($low=$low ;$low <= $height; $low++) { 
			
			$arra[] =$low;
			}
		}elseif(!empty($step)){
			for ($low=$low ;$low <= $height; $low+=$step) { //优化之前
			
			$arra[] =$low;
			var_dump($low);
			
			}
		}*/
		return $arra;

	}
	$a=shuzu(0,50);
	var_dump($a);

/*echo '<br>';
$arr3 = [1,2,3];
foreach ($arr3 as &$v) {
	
}

var_dump($v);

foreach ($arr3 as $v) {
	echo $v;
}
*/
// var_dump($arr3);

 ?>
 