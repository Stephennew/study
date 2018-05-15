<?php 


$act=$_GET['act']??'list';

if($act == 'list'){
	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('error');
	/*分页*/
	/***
     * 分页:  实现分页的核心就是利用查询的limit来做
     *
     * 假设一页显示3条记录
     *      页码       limit
     *        1          0,3
     *        2          3,3
     *        3          6,3
     *          start = (页码-1)*length
     *
     * 总页码的计算: 总记录数/length  向上取整\
     *   总记录数的查询:
     *      select count(*) from 表名;
     */
	/*页数*/
	//var_dump($_GET);
	$pageone = 1;
	$page = $_GET['page']??1;
	$length = 2;
	$start = ($page-1)*$length;
	/*总条数*/
	$counts = "select count(*) from message";

	$result2=mysqli_query($link,$counts);

	if($result2 == false){
		echo '错误sql:',$counts,'<br>',mysqli_error($link);
		//die;
	}
	$total_num=mysqli_fetch_row($result2)[0]; //结果是一个数组,可以去值
	
	/*总页数,可能是小数,ceil()需要向上取整*/
	$total_page=ceil($total_num/$length);

	/*只显示10页*/
	$startpage = $page -4;
	$endpage = $page +5;
	if($endpage > $total_page){
		$endpage=$total_page;  //如果不进行判断,会出现大于总也数的数字,报错
	}
	if($startpage < 1){
		$startpage=1;//如果不进行判断,会出现小于1数字,报错
	}

	/*上一页,下一页*/
	$prv=$page-1;
	$next=$page+1;
	$prv=$prv<1?1:$prv;
	$next=$next>$total_page?$total_page:$next;
	
	//2.准备sql
	$sql = "select * from message order by is_top desc,id desc limit {$start},{$length}";

	
	//3.执行sql

	$result=mysqli_query($link,$sql);
	

	//4.判断是否对象结果集
	if($result === 'false'){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	}
	//5.查看是否是查询语句,是的话需要解析结果集

	$rowss=mysqli_fetch_all($result,1);


	/*回复留言开始*/

	$link1=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('error');

	foreach ($rowss as $reply) {
		$sql1 = "select * from reply where p_id={$reply['id']}";

		$res=mysqli_query($link1,$sql1);

		if($res === false){
			echo '错误sql:',$sql1,'<br>','错误信息:',mysqli_error($link1);
			die();
		}

		$reply['reply']=mysqli_fetch_all($res,1);
		$rows[]=$reply;
		//var_dump($reply1);

	}



	require 'list.html';
	

}elseif($act == 'add_save'){
	extract($_POST);

	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('error');
	//2.准备sql

	$add_date=time();
	/*$sql = "insert into message (name,date,content) value(null,'$name','$add_date','$content')";*/
	$sql ="insert into message set name='{$name}',date='{$add_date}',content='{$content}'";
	//var_dump($sql);die();
	//3.执行sql
	$result=mysqli_query($link,$sql);
	//var_dump($result);die();
	//4.判断是否执行成功
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}

	//5.是否是查询语句,是的话解析结果集

	//6关闭连接
	mysqli_close($link);
	//echo '留言成功';
	header('Refresh: 0; url=condition.php'); //延迟转向 也就是隔几秒跳转

}elseif($act == 'del'){
	$id=$_GET['id'];
	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('error');
	//2.准备sql
	$sql = "delete from message where id='{$id}'";

	//3.执行sql
	$result=mysqli_query($link,$sql);

	//4 判断是否执行成功

	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}

	//5.是否查询语句


	//6 关闭连接

	mysqli_close($link);
	echo '删除成功';
	header('Refresh: 1; url=condition.php'); //延迟转向 也就是隔几秒跳转

}elseif($act == 'edit'){
	$id=$_GET['id'];
	//echo $id;
	//1. 连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('数据库连接失败');
	//2.准备sql
	$sql = "select * from message where id='{$id}'";

	//3.执行sql

	$result=mysqli_query($link,$sql);

	//4.判断结果集

	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}
	//5. 是否是查询语句,是解析结果集
	$row=mysqli_fetch_assoc($result);


	require 'update.html';
}elseif($act == 'edit_save'){

	extract($_POST);
	//1. 连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('数据库连接失败');
	//2.准备sql
	$add_date=time();
	$sql = "update message set name='{$name}',date='{$add_date}',content='{$content}' where id='{$id}'";

	//3.执行sql
	$result=mysqli_query($link,$sql);
	//4.判断结果集
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}
	//5.是否是查询语句

	echo '更新成功!';

	header('Refresh: 1; url=condition.php'); //延迟转向 也就是隔几秒跳转
}elseif($act == 'is_top'){

	$id=$_GET['id'];
	$is_top=$_GET['is_top'];

	$is_top=$is_top?0:1;
	//1.连接数据库

	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('连接数据库失败');

	//2.准备sql
	$sql = "update message set is_top='{$is_top}' where id='{$id}'";

	//3.执行sql

	$result=mysqli_query($link,$sql);

	//4.判断
	if($result === false){
		echo '错误sqL:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}
	//5 不是查询语句

	//6 关闭连接
	mysqli_close($link);

	//echo '置顶成功!';
	header('Refresh: 0; url=condition.php'); //延迟转向 也就是隔几秒跳转
}elseif($act == 'zan'){
	$id=$_GET['id'];
	$zan = $_GET['zan'];

	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die();

	//2.准备sql

	$sql = "update message set zan=$zan+1 where id='{$id}'";
	//$sql = "update message  set zan=$zan+1 where id='{$id}'";

	//3.执行sql
	$result = mysqli_query($link,$sql);

	//4.判断
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die;
	}

	//5.不是查询

	//6.关闭连接
	mysqli_close($link);

	header('Location:condition.php'); //延迟转向 也就是隔几秒跳转
}elseif($act == 'report'){

	$id=$_GET['id'];
	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('数据库连接失败');
	//2.准备sql
	$sql = "update message set jubao=jubao+1 where id='{$id}'";

	//3.执行sql

	$result=mysqli_query($link,$sql);
	//4.判断

	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
		die();
	}

	//5.是否是查询语句


	//6.关闭连接
	mysqli_close($link);
	header('Refresh: 0; url=condition.php'); //延迟转向 也就是隔几秒跳转
}elseif($act == 'reply_huixian'){

	$p_id=$_GET['id'];

	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('连接数据库失败');
	//2.准备sql

	$sql = "select * from message where id='{$p_id}'";

	//3.执行sql

	$result=mysqli_query($link,$sql);

	//4.判断
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	}

	//5.是查询语句,解析结果集

	$row=mysqli_fetch_assoc($result);
	require 'html/huixian_reply.html';
	//6.关闭连接
	mysqli_close($link);

	require 'html/reply.html';
}elseif($act == 'reply_save'){
	extract($_POST);

	//1.连接数据库
	$link=mysqli_connect('127.0.0.1','root','root','message_board',3306)or die('连接数据库失败');
	//2.准备sql
	$create_time=time();

	//$sql = "insert into reply set (name,create_time,reply_content,p_id) values('$name','$create_time','$reply_content','$p_id')";

	$sql = "insert into reply set name='{$name}',create_time='{$create_time}',reply_content='{$reply_content}',p_id='{$p_id}'";
	//3.执行sql

	$result=mysqli_query($link,$sql);

	//4.判断
	if($result === false){
		echo '错误sql:',$sql,'<br>','错误信息:',mysqli_error($link);
	}

	//5.不是查询语句,无解析结果集

	//$row=mysqli_fetch_assoc($result);
	//require 'html/huixian_reply.html';
	//6.关闭连接
	mysqli_close($link);

	//require 'html/reply.html';
	header('Refresh: 0; url=condition.php'); //延迟转向 也就是隔几秒跳转
}

 ?>