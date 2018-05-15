<?php 

	//1
	$b=0;
	for ($i=1; $i <=1000 ; $i++) { 
		if($i%3==0){
			$b+=$i;
		}
	}
	echo $b;

	//2

	/*$a = 1,$b=2,$c;
　　$c = $a++ + $b;
　　$c = $a-- + $b; 
　　$a = $c++ +$b;
　　$b = $a-- + $c++;*/
	
echo '<hr>';
	//3
	
	$fenshu=mt_rand(1,100);
	if($fenshu>=90){
		echo ' 优秀';
	}elseif($fenshu>=80){
		echo '良好';
	}elseif($fenshu>=70){
		echo '中等';
	}elseif($fenshu>=60){
		echo '及格';
	}else{
		echo '不及格';
	}
	echo '<hr>';
	//4
	$cunkuan=mt_rand(1,100001);
	echo $cunkuan;
	if($cunkuan>20 && $cunkuan<300){
		echo '公交车';
	}elseif($cunkuan>300 && $cunkuan<5000){
		echo '自行车';
	}elseif($cunkuan>5000 && $cunkuan<100000){
		echo '摩托车';
	}elseif($cunkuan>100000){
		echo '小起车';
	}elseif($cunkuan<20){
		echo '步行';
	}
echo '<hr>';
	//5
	$b=0;
	$c = 0;
	for ($i=1; $i <1000 ; $i++) { 
		if ($i%3==0) {
			if($i%2==0){
				$c++;
				$b+=$i;
				
			}
		}
	}
	echo $c.'<br>';

	echo $b;
echo '<hr>';
	//6

	for ($i=1; $i <=9 ; $i++) { 
		//echo $i;
		for ($j=1; $j <=$i ; $j++) { 
			echo $j.'X'.$i.'='.$j*$i;
		}
		echo '<br>';	
	}

echo '<hr>';
	//
	//写一个程序输出1到100这些数字。但是遇到数字为3的倍数的时候，输出“三”替代数字，为5的倍数用“五”代替，既是3的倍数又是5的倍数则输出“三五”。
	for ($i=1; $i<=100 ; $i++) {

		if($i%3==0 && $i%5==0){
			echo '三五';
		}
		if ($i%3==0) {
			echo '三';
		}
		if($i%5==0){
			echo '五';
		}
		
		echo $i ;
	}


	//8 写一个函数实现：输出指定行数的星星塔，效果如：
echo '<hr>';
	for ($i=1; $i<=4 ; $i++) { 
		for ($j=1; $j <4-$i ; $j++) { 
			echo '&nbsp;';
		}
		for ($k=1; $k <= 2*$i-1; $k++) { 
			echo '*';
		}
		echo '<br>';
	}

	//9. 递归函数求n到0之间所有整数的和。

	function my_sum($n){
		if ($n>0) {
			return $n+=my_sum($n-1);
		}
	}
	echo my_sum(5);

	function my_sum1($n){

		for ($i=1; $i < $n; $i++) { 
			//echo 1;
			if($n>0){
			return $n+=$n-1;
		}
		$n--;
		}
		
	}
	echo my_sum1(10);

	//10.定义一个函数，传入一个数字序列的数组，求数组中大于平均值的数的个数，和小于平均值的数的个数。
echo '<hr>';
	$arr = [22,2,4,52,6];

	function num($arr){
		$len=count($arr);
		echo $len;
		$sum=array_sum($arr);
		$avg=$sum/$len;
		$dayu=0;
		$xiaoyu=0;
		$geshu =[];
		for ($i=0; $i <$len ; $i++) { 
			if($arr[$i]>$avg){
				$dayu++;
			}else{
				$xiaoyu++;
			}
		}
		return $geshu=[$dayu,$xiaoyu];
	}

	var_dump(num($arr));

echo '<hr>';

	//11.求该数组的平均值，最大值，最小值
	
	$arr= [
		[12,49,23,123],
		[54,54,23,63],
		[86,67,34,23]

	];

	$a=array_merge($arr[0],$arr[1],$arr[2]);
	//var_dump($a);die();
	function avg_max_min($arr){
		$all=[];
		$a=[];
		$len=0;
		$sum=0;
		foreach ($arr as $value) {
			$len+=count($value);
			$sum+=array_sum($value);
			foreach ($value as $v) {
				$a[]=$v;
			}
		}
		rsort($a);
		//die();
		$avg=$sum/$len;
		$max=array_shift($a);
		$min = end($a);
		//echo $min;
		return $all=['平均'=>$avg,'最大'=>$max,'最小'=>$min];
	}
	var_dump(avg_max_min($arr));


	//12 请写一个函数，实现以下功能：  字符串“open_door” 转换成 “OpenDoor”、”make_by_id” 转换成 ”MakeById”。

	echo '<hr>';
	$arr=['open_door','make_by_id'];
	function daxie($str){
		$c=[];
		foreach ($str as $value) {
			$a=str_replace('_', ' ', $str);
		}
		//var_dump($a);die();
		for ($i=0; $i <count($a);$i++) { 
			$c[]=ucwords($a[$i]);
		}
		foreach ($c as $v) {
			$a1[]=str_replace(' ', '', $v);
		}
		return $a;
	}
	var_dump(daxie($arr));

	//13. 请写一个函数, 实现以下功能:   输入字符串 "2017-08-03",输出该日期是 星期几.
	echo '<hr>';
	$str ='2017-08-05';
	function xingqi($str){
		$times=strtotime($str);
		echo'您输入年月日当天是星期:',date('N',$times);
	}

	xingqi($str);
	//echo time();








$user = array(
    '0' => array('id' => 100, 'username' => 'a1'),
    '1' => array('id' => 101, 'username' => 'a2'),
    '2' => array('id' => 102, 'username' => 'a3'),
    '3' => array('id' => 103, 'username' => 'a4'),
    '4' => array('id' => 104, 'username' => 'a5'),
);

$result = array_reduce($user, function ($result, $value) {
    return array_merge($result, array_values($value));
}, array());

var_dump($result);

echo '<hr>';
/*
function ss($arr,$key='1',$a='d'){
	$result=[];
	if($key==1){

	}elseif ($key=='a') {
		
	}
	if($a=='a'||$a==''){
		return $result=ksort($arr);
	}elseif($a=='d'){
		return $result=(krsort($arr));
	}

reset($keysvalue);
	
	
}
ss($user);
*/



$user = array(
    '0' => array('id' => 100, 'username' => 'a1'),
    '1' => array('id' => 101, 'username' => 'a2'),
    '2' => array('id' => 102, 'username' => 'a3'),
    '3' => array('id' => 103, 'username' => 'a4'),
    '4' => array('id' => 104, 'username' => 'a5'),
);
function array_key_sort1($arr,$keys,$type='asc'){  
    $keysvalue=[]; 
    $new_array=[];  

    foreach ($arr as $k=>$v){
        $keysvalue[$k] = $v[$keys]; 
    }  
    if($type == 'asc'){  
        asort($keysvalue);  
    }else{  
        arsort($keysvalue); 
    }  
    foreach ($keysvalue as $k=>$v){ 
    	//print_r($keysvalue);
        $new_array[$k] = $arr[$k];
    }  
    return $new_array; 
}

var_dump(array_key_sort1($user,'username','d'));



 echo '<hr>';
function sortByKey($arr,$key,$order=0){
    usort($arr,function($a,$b) use($key,$order){
        $res = $a[$key] <=> $b[$key];
        echo $res.'<br>';
        if($order == 0){
            return  $res;
        }else{
            return -$res;
        }
    });
    return $arr;
}
$students = array(
    array('name'=>'关羽','age'=>29,'height'=>1.6),
    array('name'=>'刘备','age'=>27,'height'=>1.7),
    array('name'=>'赵云','age'=>18,'height'=>1.8),
    array('name'=>'张飞','age'=>25,'height'=>1.6)
    //array('name'=>'张飞','age'=>23,'height'=>1.6),
    //array('name'=>'张飞','age'=>22,'height'=>1.6),
   // array('name'=>'张飞','age'=>22,'height'=>1.6)

);
$arr = sortByKey($students,'age',1);
var_dump($arr);


foreach ($students as $key => $value) {
	echo $res=$value['age']<=>$value['age'].'<br>';

}



echo '<hr>';
function kuaisu($arr){
    if(count($arr)<=1){//递归出口
        return $arr;
    }
    $biaoz = array_shift($arr);
    $left = [];
    $right = [];
    foreach($arr as $val){
        if($val >= $biaoz){
            $right[] = $val;
        }else{
            $left[]=$val;
        }
    }
    $right = kuaisu($right);
    $left = kuaisu($left);
    var_dump($left);
    return array_merge($left,(array)$biaoz,$right);
}
$arr = [4,68,29,7,8,21,87,3,65];
$arr = kuaisu($arr);
//var_dump($arr);






 ?>