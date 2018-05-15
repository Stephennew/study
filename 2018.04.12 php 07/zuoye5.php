<?php 
	
	function p($n){
		var_dump($n);
		die();
	}
	$arr = [1,2,3,4,5,5];

	//var_dump(array_values($arr)); //获取数组的值

	//p(array_keys($arr));//获取数组的键名
	//filp 翻转
	//p(array_flip($arr)) //数组中的值与键名互换
	//p(in_array(3, $arr)); //在数组中检索值是否存在

	//p(array_search(6, $arr));//在数组中检索值,存在返回键名,否则返回false

	//p(array_key_exists(0, $arr));//检索给定的键名是否存在数组中
	//p(range(1, 5,2));//创建一个包含指定范围单元的数组

	//p(array_unique($arr));//移除数组中重复的值,新的数组中会保留原始的键名
	//p(array_reverse($arr,TRUE));//返回一个单元顺序与原数组相反的数组,如果参数为true 保留原来的键名
	p(array_merge($arr,$arr));//将多个数组合并起来



 ?>