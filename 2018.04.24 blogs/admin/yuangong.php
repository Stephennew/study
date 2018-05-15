<?php 
	require '../../public.php';
	$act=$_GET['act']??'yuangong_list';
	$link=my_conn('blogs');
	if($act == 'yuangong_list'){

		$sql1 = "select * from bumen";
		$rows=my_query($link,$sql1);
		$rowss=my_fetch_all($rows,1);
		foreach ($rowss as $va) {
			$arr[$va['id']]=$va['bumen'];
		}
		
		$sql = "select * from yuangong";
		$result=my_query($link,$sql);
		$rows=my_fetch_all($result,1);
		require 'html/yuangong_list.html';
	}
	elseif ($act == 'yuangong_add') {
		$sql = "select * from bumen";
		$rows=my_query($link,$sql);
		$rowss=my_fetch_all($rows,1);
		require 'html/yuangong_add.html';
	}
	elseif ($act == 'yuangong_add_save') {
		extract($_POST);

/*		array(1) {
		  ["icon"]=>
		  array(5) {
		    ["name"]=>
		    string(27) "(XP5IM~15`TA_{7DQ{%5[}E.gif"
		    ["type"]=>
		    string(9) "image/gif"
		    ["tmp_name"]=>
		    string(26) "C:\Windows\Temp\phpCC8.tmp"
		    ["error"]=>
		    int(0)
		    ["size"]=>
		    int(13580)
		  }
		}*/
		if($_FILES['icon']['error']==0){
			$tmp_name = $_FILES['icon']['tmp_name'];
			$old_name = $_FILES['icon']['name'];
			$suffix=strrchr($old_name, '.');
			$new_name = 'images/'.uniqid().mt_rand(2222,99999999).$suffix;
			$type = ['.jpg','.jpeg','.gif','.png'];
			if(!in_array($suffix, $type)){
				my_jump('您上传的图片格式不正确,请重新上传!',1,'?act=yuangong_add');
			}
			move_uploaded_file($tmp_name, $new_name);
		}
		
		$icon =$new_name??'';
		$hobby1='';
		foreach ($hobby as $k=>$v) {
			$hobby1 .=$v;
		}
		$sql = "insert into yuangong values(null,'$name','$age','$sex','$icon','$bumen','$hobby1','$text')";
		$result=my_query($link,$sql);

		jump('?act=yuangong_list');

	}elseif ($act == 'yuangong_edit') {
		extract($_GET);

		$sql1 = "select * from bumen";
		$rows=my_query($link,$sql1);
		$rowss=my_fetch_all($rows,1);


		$sql ="select * from yuangong where id ='$id'";
		$result=my_query($link,$sql);
		$row=my_fetch_assoc($result);

		$hobby = $row['hobby'];
		$hobby1=explode(' ', $hobby);//explode — 使用一个字符串分割另一个字符串

		require 'html/yuangong_edit.html';
	}elseif ($act == 'yuangong_edit_save') {
		extract($_POST);
		
		$hobby1='';
		foreach ($hobby as $val) {
			$hobby1 .=$val;
		}
		
		$sql = "update yuangong set name='$name',age='$age',sex='$sex',bumen_id='$bumen',hobby='$hobby1',text='$text' where id='$id'";
		my_query($link,$sql);

		jump('?act=yuangong_list');
	}
	elseif ($act == 'yuangong_del') {
		
		extract($_GET);
		$sql = "delete from yuangong where id ='$id'";
		my_query($link,$sql);

		jump('?act=yuangong_list');
	}






 ?>