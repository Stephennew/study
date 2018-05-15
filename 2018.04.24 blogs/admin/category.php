<?php
	require '../../public.php';
	$link=my_conn('blogs');
	$act=$_GET['act']??'';
	if(!isset($_SESSION['userinfo'])){
		my_jump('您没有登录,请先登录!',1,'login.php?act=login');
	}
	if($act == 'login'){	
		require 'html/login.html';
	}
	elseif($act == 'category_list'){
		
		$sql = "select * from category";
		$result=my_query($link,$sql);
		$list=my_fetch_all($result,1);
		require 'html/category_list.html';
	}
	elseif ($act == 'category_add') {
		require 'html/category_add.html';
	}
	elseif($act == 'category_add_save'){
		
		extract($_POST);
		$is_show = $is_show??0;
		$sql = "insert into category values(null,'$name','$content','$is_show')";
		my_query($link,$sql);

		jump('category.php?act=category_list');

	}
	elseif ($act == 'category_del') {
		extract($_GET);
		$sql = "delete from category where id='$id'";
		my_query($link,$sql);
		my_jump('删除成功!',1,'category.php?act=category_list');
	}
	elseif ($act == 'category_edit') {
		extract($_GET);
		$sql = "select * from category where id='$id'";
		$result=my_query($link,$sql);
		$row=my_fetch_assoc($result);

		require 'html/category_edit.html';
	}
	elseif ($act == 'category_edit_save') {
		
		extract($_POST);
		$is_show = $is_show??0;
		$sql = "update category set name='$name',content='$content',is_show='$is_show' where id=$id";
		my_query($link,$sql);

		jump('category.php?act=category_list');
	}
	mysqli_close($link);
?>