<?php 
	
	require '../../public.php';
	$link=my_conn('test');
	$act = $_GET['act']??'list';
	if($act == 'list'){
		$sql = "select * from article";
		$result=my_query($link,$sql);
		$rows=my_fetch_all($result,1);

		require 'html/article_list.html';
	}
	elseif ($act == 'edit') {
		$id=$_GET['id'];
		$sql = "select * from article where art_id ='$id'";
		$result=my_query($link,$sql);
		$row = my_fetch_assoc($result);
		

		require 'html/article_edit.html';

	}
	elseif ($act == 'edit_save') {
		extract($_POST);
		$sql = "update article set title='$title',intro='$intro',user_id='$user_id',status='$status' where art_id='$id'";
		my_query($link,$sql);

		my_jump('修改成功!',1,'article.php?act=list');
	}
	elseif ($act == 'del') {
		$id=$_GET['id'];
		$sql = "delete from article where art_id='$id'";
		my_query($link,$sql);
		my_jump('删除成功!',1,'article.php?act=list');
	}
	elseif ($act == 'add') {
		
		require 'html/article_add.html';
	}
	elseif ($act == 'add_save') {
		extract($_POST);
		$status = 0;
		$sql = "insert into article values(null,'$title','$intro','$user_id','$status')";
		my_query($link,$sql);

		my_jump('添加成功!',1,'article.php?act=list');
	}




 ?>