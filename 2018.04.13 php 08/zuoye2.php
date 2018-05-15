<?php 

//20170410182055184.jpg

$str='20170410182055184.jpg';
echo strrchr($str,".");

if(strrchr($str,".")=='.jpg'||strrchr($str,".")=='.png'||strrchr($str,".")=='.gif'){
	echo "合法";
}else{
	echo "不合法";
}



 ?>