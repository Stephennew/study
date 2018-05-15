<?php 
	//require '../publicUtil.php';
	class mysqlDb{
		public $host;
		public $user;
		public $pwd;
		public $database;
		public $prot;
		public $charset;
		public $link;
		/*通过new关键字创建对象时自动调用,初始化成员*/
		public function __construct($database){
			$this->host = $host??'127.0.0.1';
			$this->user = $user??'root';
			$this->pwd = $pwd??'root';
			$this->database = $database;
			$this->prot = $prot??'3306';
			$this->charset = $charset??'utf8';
			$this->conn();
			$this->setCharset();
		}
		/*连接数据库*/
		public function conn(){
			$result=$this->link =mysqli_connect($this->host,$this->user,$this->pwd,$this->database,$this->prot);
			if($result === false){
				die('错误代码:'.mysqli_connect_errno().'错误信息:'.mysqli_connect_error());
			}
		}
		/*设置字符集编码*/
		public function setCharset(){
			$resutl=mysqli_set_charset($this->link,$this->charset);
			if($resutl === false){
				die('设置字符集失败!'.'错误代码:'.mysqli_errno($this->link).'错误信息:'.mysqli_error($this->link));
			}
		}
		/*查询数据*/
		public function query($sql){
			$result=mysqli_query($this->link,$sql);
			if($result === false){
				die('错误sql:'.$sql.'错误代码:'.mysqli_errno($this->link).'错误信息:'.msyqli_error($this->error));
			}
			return $result;
		}
		/*关联数组,返回多条数据*/
		public function fetchAll($result){
			return mysqli_fetch_all($result,MYSQLI_ASSOC);
		}

		/*关联数组,返回一条数据*/
		public function fetchRow($result){
			return mysqli_fetch_assoc($result);
		}

		/*索引数组,返回一条数据*/
		public function fetchNum($result){
			return mysqli_fetch_row($result);
		}
		/*获取结果中的第一行,第一列*/
		public function fetchColumn($result){
			return mysqli_fetch_assoc($result);
		}
		/*执行 insert update delete 语句*/
		public function excute($sql){
			$this->query($sql);
		}

		/*对象被销毁时执行清理工作,列如:关闭第三方资源*/
		public function __destruct(){
			mysqli_close($this->link);
		}
	}	

	/*$stu = new mysqlDb('blogs');
	$sql ="select count(*) as num from article";
	
	Util::dump($stu->fetchColumn($stu->query($sql)));*/
 ?>