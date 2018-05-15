<?php 
	//require '../publicUtil.php';
	//require './config.php';
namespace Tools;
	class MysqlDb{
		private $host;
		private $user;
		private $pwd;
		private $database;
		private $prot;
		private $charset;
		private $link;
		private static $object = null; //私有的静态的属性,保存创建的对象 ,静态属性伴随着初始化
		/*私有的构造方法,限制类外通过new关键字创建对象,提高封装性,通过new关键字创建对象时自动调用,初始化成员*/
		private function __construct($arr){
			$this->host = $arr['host']??'127.0.0.1';
			$this->user = $arr['user']??'root';
			$this->pwd = $arr['pwd'];
			$this->database = $arr['database'];
			$this->prot = $arr['prot']??'3306';
			$this->charset = $arr['charset']??'utf8';
			$this->conn();
			$this->setCharset();
		}
		/*连接数据库*/
		private function conn(){
			$result=$this->link =mysqli_connect($this->host,$this->user,$this->pwd,$this->database,$this->prot);
			if($result === false){
				die('错误代码:'.mysqli_connect_errno().'错误信息:'.mysqli_connect_error());
			}
		}
		/*设置字符集编码*/
		private function setCharset(){
			$resutl=mysqli_set_charset($this->link,$this->charset);
			if($resutl === false){
				die('设置字符集失败!'.'错误代码:'.mysqli_errno($this->link).'错误信息:'.mysqli_error($this->link));
			}
		}
		/*查询数据*/
		public function query($sql){
			$result=mysqli_query($this->link,$sql);
			if($result === false){
				die('错误sql:'.$sql.'错误代码:'.mysqli_errno($this->link).'错误信息:'.mysqli_error($this->link));
			}
			return $result;
		}
		/*公有的静态的创建对象的方法*/
		public static function getInstance($arr){
			if(!self::$object instanceof self){//self::$object == null
				self::$object = new self($arr);
			}
			return self::$object;
		}
		/*关联数组,返回多条数据*/
		public function fetchAll($sql){
			
			return mysqli_fetch_all($this->query($sql),MYSQLI_ASSOC);
		}

		/*关联数组,返回一条数据*/
		public function fetchRow($sql){

			return mysqli_fetch_assoc($this->query($sql));
		}

		/*索引数组,返回一条数据*/
	/*	public function fetchNum(){
			return mysqli_fetch_row($this->query($sql));
		}*/
		/*获取结果中的第一行,第一列*/
		public function fetchColumn($sql){
			
			return array_shift($this->fetchRow($sql));
		}
		/*执行 insert update delete 语句*/
		public function excute($sql){
			$this->query($sql);
		}

		/*对象被销毁时执行清理工作,列如:关闭第三方资源*/
		public function __destruct(){
			mysqli_close($this->link);
		}
		/*私有的克隆方法,限制通过clone关键字克隆对象*/
		private function __clone(){

		}
		/*对象序列化的时候自动调用,返回需要被序列化的属性组成的数组*/
		public function __sleep(){
			return ['host','user','pwd','database','prot','charset']; 
		}
		/*反序列化的时候自动调用,进行初始化工作*/
		public function __wakeup(){
			//连接数据库
			$this->conn();
			//设置字符集
			$this->setCharset();
		}

	}	

	//$stu = mysqlDb::getIstance($userinfo['DB']);

	/*Util::dump($stu);die;
	$sql ="select count(*) as num from article";
	
	Util::dump($stu->fetchColumn($stu->query($sql)));*/
 ?>