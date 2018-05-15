<?php 
/*var_dump($_POST);
var_dump($_POST['convert']);
exit;*/
/*base_convert(, frombase, tobase)*/ //所有进制转换函数  numeric 检测是否是数字
$number1=$_POST['number']??''; //后面的是空操作符 没有值是默认值为空
$number=is_numeric($number1);
if(!$number){
	echo "你输入不是数字,请重新输入";
}else{
	switch ($_POST['convert']) {
	case 1:
		$result=base_convert($_POST['number'], 10, 2);
		break;

	case 2:
		$result=base_convert($_POST['number'], 10, 8);
		break;

	case 3:
		$result=base_convert($_POST['number'], 10, 16);
		break;

	case 4:
		$result=base_convert($_POST['number'], 2, 10);
		break;

	case 5:
		$result=base_convert($_POST['number'], 8, 10);
		break;

	case 6:
		$result=base_convert($_POST['number'], 16,10);
		break;

	case 7:
		$result=base_convert($_POST['number'], 2, 8);
		break;

	case 8:
		$result=base_convert($_POST['number'], 2, 16);
		break;

	case 9:
		$result=base_convert($_POST['number'], 8, 2);
		break;

	case 10:
		$result=base_convert($_POST['number'], 8, 16);
		break;

	case 11:
		$result=base_convert($_POST['number'], 16, 2);
		break;

	case 12:
		$result=base_convert($_POST['number'], 16, 8);
		break;
	
	default:
		
		break;
}
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>convert</title>
 </head>
 <body>
 	<form action="" method="post">
 		number:<input type="text" name="number" value="<?=$number1??''?>">
 		<select name="convert">
 			<option value="1" >10to2</option>
 			<option value="2" >10to8</option>
 			<option value="3" >10to16</option>
 			<option value="4">2to10</option>
 			<option value="5">8to10</option>
 			<option value="6">16to10</option>
 			<option value="7">2to8</option>
 			<option value="8">2to16</option>
 			<option value="9">8to2</option>
 			<option value="10">8to16</option>
 			<option value="11">16to2</option>
 			<option value="12">16to8</option>
 		</select>
 		<input type="submit" name="" value="convert">
 		<input type="text" name="" value="<?=$result ??''?>">
 	</form>
 </body>
 </html>

