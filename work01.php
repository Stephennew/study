<?php 
/*	echo '<pre>';
	var_dump($_SERVER);
	echo '<pre>';
	var_dump($_SERVER['REQUEST_URI']);*/

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style>
 		.ss{
 			border:1px solid black;
 		}
 		.ss td{
 			border:1px solid black;

 		}
 		.dd{
 			background: #D9D9D9;
 		}
 	</style>
 </head>
 <body>
 	<table class="ss" cellspacing="0" cellpadding="0">
 		<tr>
 			<td class="dd">变量名</td>
 			<td class="dd">变量值</td>
 			<td class="dd">含义</td>
 		</tr>
 		<tr>
 			<td>$_SERVER['REQUEST_TIME']</td>
 			<td>int(1522750269)</td>
 			<td>请求开始时的时间戳。从 PHP 5.1.0 起可用。</td>
 		</tr>
 		<tr>
 			<td>$_SERVER['HTTP_CONNECTION']</td>
 			<td>string(10) "keep-alive"</td>
 			<td>'HTTP_CONNECTION'当前请求头中 Connection: 项的内容，如果存在的话。例如："Keep-Alive"。 </td>
 		</tr>
 		<tr>
 			<td>$_SERVER['REMOTE_HOST']</td>
 			<td></td>
 			<td>'REMOTE_HOST'浏览当前页面的用户的主机名。DNS 反向解析不依赖于用户的 REMOTE_ADDR。</td>
 		</tr>
 		<tr>
 			<td>'REMOTE_PORT</td>
 			<td>string(5) "52777"</td>
 			<td>'REMOTE_PORT'用户机器上连接到 Web 服务器所使用的端口号。 </td>
 		</tr>
 		<tr>
 			<td>'REQUEST_URI'</td>
 			<td>string(43) "/2018.3.22/2018.04.03%20php%2001/work01.php"</td>
 			<td>'REQUEST_URI' URI 用来指定要访问的页面。例如 "/index.html"。</td>
 		</tr>
 	</table>
 </body>
 </html>