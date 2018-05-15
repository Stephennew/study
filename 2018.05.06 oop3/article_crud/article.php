<?php 
	
	require '../mysqlDb.class.php';
	require '../../publicUtil.php';
	$art = new mysqlDb('blogs');
	$act=$_GET['act']??'list';
	if($act == 'list'){
		$sql ="select * from article";
		$res=$art->query($sql);
		$rows=$art->fetchAll($res);

		$sql1 = "select * from category";
		$res1=$art->query($sql1);
		$cates=$art->fetchAll($res1);
		foreach ($cates as $val) {
			$arr[$val['id']]=$val['name'];
		}

		require 'html/article_list.html';
	}
	elseif ($act == 'add') {

		$sql ="select * from category";
		$res=$art->query($sql);
		$rows=$art->fetchAll($res);
		require 'html/article_add.html';
	}
	elseif ($act == 'add_save') {

		extract($_POST);
		$time = time();
		$sql = "insert into article values(null,'$title','$content','$category_id','$time',0)";
		$art->excute($sql);
		Util::my_jump('添加成功!',1,'?act=list');
	}
	elseif ($act == 'edit') {

		$id=$_GET['id'];
		$sql ="select * from article where id = '$id'";
		$res=$art->query($sql);
		$row=$art->fetchRow($res);

		$sql1 = "select * from category";
		$res1=$art->query($sql1);
		$cates=$art->fetchAll($res1);
		require 'html/article_edit.html';
	}
	elseif ($act == 'edit_save') {

		extract($_POST);
		$time =time();
		$sql = "update article set title='$title',content='$content',category_id='$category_id',intime='$time',hit=0 where id='$id'";
		$art->excute($sql);
		Util::my_jump('修改成功!',1,'?act=list');

	}
	elseif ($act == 'del') {
		
		$id=$_GET['id'];
		$sql = "delete from article where id='$id'";
		$art->excute($sql);
		Util::my_jump('删除成功!',1,'?act=list');
	}	

 ?>