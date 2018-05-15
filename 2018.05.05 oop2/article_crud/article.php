<?php 
	require '../zuoye6.php';
	require '../../public.php';

	$art = new mysqlDb('blogs');

	$act = $_GET['act']??'list';
	if($act == 'list'){
		$sql1 = "select * from category";
		$res1=$art->query($sql1);
		$rowss=$art->fetchAll($res1);
		foreach ($rowss as $val) {
			$arr[$val['id']]=$val['name'];
		}
		$sql ="select * from article";
		$res=$art->query($sql);
		$rows=$art->fetchAll($res);
		require 'article_list.html';
	}
	elseif ($act == 'add') {
		$sql ="select * from category";
		$res=$art->query($sql);
		$cates=$art->fetchAll($res);
		require 'article_add.html';
	}
	elseif ($act =='add_save') {
		extract($_POST);
		$time = time();
		$sql ="insert into article values(null,'$title','$content','$categroy_id','$time',0)";
		$art->excute($sql);
		my_jump('添加成功!',1,'?act=list');
	}
	elseif($act == 'del'){
		extract($_GET);
		$sql ="delete from article where id='$id'";
		$art->excute($sql);
		my_jump('删除成功!',1,'?act=list');
	}
	elseif ($act == 'edit') {
		extract($_GET);
		$sql1 ="select * from category";
		$ress=$art->query($sql1);
		$rows=$art->fetchAll($ress);


		$sql = "select * from article where id='$id'";
		$res=$art->query($sql);
		$row=$art->fetchAssoc($res);
		require 'article_edit.html';	
	}
	elseif ($act =='edit_save') {
		extract($_POST);
		$time = time();
		$sql = "update article set title='$title',content='$content',category_id='$category_id',intime='$time',hit=0 where id=$id";
		$art->excute($sql);
		my_jump('修改成功!',1,'?act=list');
	}

 ?>