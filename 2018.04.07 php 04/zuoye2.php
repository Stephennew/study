<?php
//第一个
for ($i=1; $i < 6; ++$i) { 
	for ($j=1; $j <= $i; ++$j) { 
		echo '*';
	}
	echo '<br>';
}

//第二个
echo '<hr>';
for ($i=1; $i<6 ; ++$i) { 
	for ($j=1; $j <=2*$i-1 ; $j++) { 
		echo '*';
	}
	echo '<br>';
}

//第三个

echo '<hr>';

for ($i=1; $i < 6; ++$i) { 
	for ($space=1; $space <=5-$i; ++$space) { 
		echo '&nbsp;';
	}
	for ($j=1; $j <=2*$i-1; $j++) { 
		echo '*';
	}
	echo '<br>';
}

//第四个

echo '<hr>';
for ($i=1; $i < 6; ++$i) { 
	for ($space=1; $space <=5-$i; ++$space) { 
		echo "&nbsp;";
	}
	for ($j=1; $j <= 2*$i-1; ++$j) {
		if ($j==1 || $j==2*$i-1) {
			echo '*';
		}else{
			echo "&nbsp;";
		}
	}
	echo '<br>';
}

//第五个

echo '<hr>';
$hang = 5;
for ($i=1; $i <= 5 ; $i++) { 
	for ($space=1; $space <=5-$i ; $space++) { 
		echo '&nbsp;';
	}
	for ($j=1; $j <= 2*$i-1; $j++) { 
		if ($j==1 || $j==2*$i-1 || $i==$hang) { //$i==5 输出*  
			
			echo '*';
		}else{
			echo '&nbsp;';
		}
	}
	echo '<br>';
}

var_dump(getcwd()); //getcwd() 获取当前代码运行目录
/*echo '<pre>';
var_dump(get_defined_constants());*/
echo '<br>';
var_dump(__DIR__); //当前文件所在目录