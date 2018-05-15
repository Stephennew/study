<?php 

	class MysqlDb{
		public $host;
		public $user;
		public $pwd;
		public $databases;
		public $prot;
		public $charset;
		public $link;
		/*通过new关键字创建对象时初始化成员*/
		public function __construct($databases){
			$this->host = $host??'127.0.0.1';
			$this->user = $user??'root';
			$this->pwd = $pwd??'root';
			$this->databases = $databases;
			$this->prot = $prot??'3306';
			$this->charset = $charset??'utf8';

			$this->conn();
			$this->setCharset();
		}
		/*连接数据库*/
		public function conn(){

			$result=$this->link=mysqli_connect($this->host,$this->user,$this->pwd,$this->databases,$this->prot);
			if($result === false){
				die('连接错误代码:'.mysqli_connect_errno().'连接错误信息:'.mysqli_connect_error());
			}
		
		}
		/*设置字符集*/
		public function setCharset(){
			$result=mysqli_set_charset($this->link,$this->charset);
			if($result === false){
				die('错误代码:'.mysqli_errno($this->link).'错误信息:'.mysqli_error($this->link));
			}
		}
		/*查询*/
		public function query($sql){
			return $this->excute($sql);
		}
		/*以关联数组的形式获取多条数据*/
		public function fetchAll($result){
			return mysqli_fetch_all($result,MYSQLI_ASSOC);
		}
		/*以索引数组的形式,获取一条数据*/
		public function fetchRow($result){
			return mysqli_fetch_row($result);
		}
		/*以关联数组形式,获取一条数据*/
		public function fetchAssoc($result){
			return mysqli_fetch_assoc($result);
		}
		/*执行*/
		public function excute($sql){
			$result=mysqli_query($this->link,$sql);
			if(!$result){
				die('错误sql:'.$sql.'错误代码:'.mysqli_errno($this->link).'错误信息:'.mysqli_error($this->link));
			}
			return $result;
			
		}
		/*对方被销毁时执行*/
		public function __destruct(){

			mysqli_close($this->link);
		}
	}
	//$time = time();
	//$sql ="insert into article values(null,'好样的','你好呀',4,'$time','30')";
	//$article = new MysqlDb('blogs');
	//var_dump($article->fetchAll($article->query($sql)));
	//$article->excute($sql);
	


 ?>