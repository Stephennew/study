<?php 
/*分页*/
		$pageone = 1;
		$page=$_GET['page']??1;
		$length=2;
		$sql1 = "select count(*) from article";
		$count=my_query($link,$sql1);
		$total_num=my_fetch_row($count,1)[0];
		$total_page = ceil($total_num/$length);
		$start = ($page-1)*$length;

		/*只显示10页*/
		$startpage = $page-4;
		$endpage=$page+5;
		if($startpage<1){
			$startpage=1;
			$endpage=$startpage+9;
		}
		if($endpage>$total_page){
			$endpage=$total_page;
			$startpage = $endpage-9;
			if($startpage<1){
				$startpage=1;
			}
		}

		/*上一页,下一页*/
		$prv = $page-1;
		$next = $page+1;
		$prv=$prv<1?1:$prv;
		$next = $next > $total_page?$total_page:$next;


 ?>