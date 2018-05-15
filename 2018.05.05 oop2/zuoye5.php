<?php 
	
	class Student{
		public $name;
		public $age;
		public $sex;
		public $tel;

		public function __construct($name,$age,$sex,$tel){
			$this->name =$name;
			$this->age = $age;
			$this->sex = $sex;
			$this->tel = $tel;
		}
		public function study(){
			print $this->name.'正在学习';
		}
		public function run(){
			print '姓名:'.$this->name.'电话'.$this->tel;
		}
	}

	$stu = new Student('嘻嘻',18,'男','1333330');
	$stu->study();
	$stu->run();



 ?>