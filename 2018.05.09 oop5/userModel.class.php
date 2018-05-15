<?php 
	require 'mysqlDb.class.php';
	class UserModel extends MysqlDb{

		public function getList(){
			$sql ="select * from user";
			return $this->fetchAll($sql);
		}

		public function del($id){
			$sql = "delete from user where id='$id'";
			$this->excute($sql);
		}

		public function addUser($data){
			extract($data);
			$sql = "insert into user values(null,'$username','$password','$email',0)";
			$this->excute($sql);
		}

		public function updateUser($data){
			extract($data);
			$sql ="update user set username='$username',password='$password',email='$email',status='$status' where id = '$id'";
			$this->excute($sql);
		}

		public function getOne($id){
			$sql = "select * from user where id = '$id'";
			return $this->fetchRow($sql);
		}
		
		
	}
	
	//UserModel::getInstance();



 ?>