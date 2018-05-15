<?php 
	require '../../public.php';
	$act=$_GET['act']??'index';
	$link=my_conn('blogs');
	/*首页*/
	if($act == 'index'){
		/*文章分类*/
		$sql = "select * from category";
		$cat=my_query($link,$sql);
		$categorys=my_fetch_all($cat,1);

		/*查询最新显示的6条*/
		$category_id=$_GET['category_id']??0;
		if($category_id==''){
			$where = '';
		}else{
			$where = "where category_id={$category_id}";
		}
		$sql1 = "select * from article {$where} order by id desc limit 0,6";
		$art=my_query($link,$sql1);
		$article=my_fetch_all($art,1);
		
		/*查询点击最高的5篇文章*/
		$sql2 = "select * from article order by hit desc,id desc limit 0,5";
		$hi = my_query($link,$sql2);
		$hit = my_fetch_all($hi,1);

		require 'html/index.html';
	}
	/*文章内容*/
	elseif ($act == 'details') {
		/*文章分类*/
		$sql = "select * from category";
		$cat=my_query($link,$sql);
		$categorys=my_fetch_all($cat,1);

		/*文章内容*/
		$id=$_GET['id']??1;
		$sql1 = "select * from article where id='{$id}'";
		$det=my_query($link,$sql1);
		$details=my_fetch_assoc($det);
		
		/*查询点击最高的5篇文章*/
		$sql2 = "select * from article order by hit desc,id desc limit 0,5";
		$hi = my_query($link,$sql2);
		$hit = my_fetch_all($hi,1);

		require 'html/details.html';

	}

 ?>