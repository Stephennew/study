<?php 
	require '../../public.php';
	$link=my_conn('blogs');
	$act = $_GET['act']??'';
	if(!isset($_SESSION['userinfo'])){
		my_jump('您没有权限,请先登录!',1,'login.php?act=login');
	}
	if($act == 'article_list'){

		$sql = "select id,name from category";
		$result=my_query($link,$sql);
		$values=my_fetch_all($result,1);
		foreach ($values as $v) {
			$arr[$v['id']] = $v['name'];
		}
		
		/*分页*/
		require 'fenye.php';

		/*文章搜索*/
		extract($_POST);
		$keywords=$_GET['keywords']??'';
		$where='';
		if($keywords==''){
			$where=='';
		}else{
			$where="where title like '%{$keywords}%'";
		}

		$sql = "select * from article {$where} order by id desc limit {$start},{$length}";
		
		$result1=my_query($link,$sql);
		$rows=my_fetch_all($result1,1);
		require 'html/article_list.html';
	}
	
	elseif ($act =='article_add') {
		$sql ="select * from category";
		$result=my_query($link,$sql);
		$rows=my_fetch_all($result,1);
		require 'html/article_add.html';
	}
	elseif ($act =='article_add_save') {
		extract($_POST);
		$intime=time();
		$sql = "insert into article values(null,'$title','$content','$category_id','$intime',null)";
		my_query($link,$sql);
		jump('article.php?act=article_list');
	}
	elseif ($act == 'article_edit') {
		extract($_GET);
		$sql = "select * from article where id=$id";
		$result=my_query($link,$sql);
		$row=my_fetch_all($result,MYSQLI_ASSOC)[0];
		
		$sql1 = "select * from category";
		$result1=my_query($link,$sql1);
		$rows = my_fetch_all($result1,1);
		require 'html/article_edit.html';
	}
	elseif ($act == 'article_edit_save') {
		
		extract($_POST);
		$intime = time();
		$sql = "insert into article values(null,'$title','$content','$category_id','$intime',null)";
		my_query($link,$sql);
		jump('?act=article_list');
	}
	elseif($act == 'article_del'){
		extract($_GET);
		$sql ="delete from article where id=$id";
		my_query($link,$sql);
		my_jump('删除成功!',1,'?act=article_list');
	}
	mysqli_close($link);

 ?>
