<?php 
	/*
		1.问：如果需要解析文件后缀为.phtml中的php代码，如xxx.phtml，怎么设置服务器。
			例子：test.36.com/test.phtml


	*/

		#告诉apache只打开后缀名.php的文件
		<FilesMatch \.phtml$>
			SetHandler application/x-httpd-php
		</FilesMatch>


 ?>