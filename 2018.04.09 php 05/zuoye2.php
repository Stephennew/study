<?php 

/*for ($i=1; $i <= 100; $i++) { 
	if ($i%3==0) {
		if ($i%2==0) {
			echo $i.'<br>';
		}
	}
}
*/
/*for ($i=1; $i <= 100; $i++) { 
	if ($i%6==0) {
		echo $i.'<br>';
	}
}*/

for ($i=1; $i <=100 ; $i++) { 
	
	$sum = $i*2*3;
	if ($sum>100) {
		break;	
	}
	echo $sum.'<br>';
}
echo $i;
 ?>