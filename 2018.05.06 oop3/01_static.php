<?php 
/*
	被static 关键字修饰的成员,称为静态成员
	在声明静态变量时 通常会伴随着初始化

	class 类名{
		public static $属性名 = 值;
		public static function 方法名(){
		
		}
	}
	
*/
	class Stu{
		public $name;
		public $age;
		public static $count = 0;

		public static $calssName = 'php'; //声明静态变量时,伴随着初始化

		public function __construct($name,$age){
			$this->name =$name;
		  	$this->age = $age;
		  	//Stu::$count; 在类里面,可以同过类名访问静态属性 
		  	++self::$count;
		}

		public function study(){
			echo $this->name,'在学习',self::$calssName,'班级','人数:',self::$count;
		}

		public static function showClassName(){
			echo '班级:',self::$calssName;
		}

	}

	$stu = new Stu('王',22);
	$stu->study();
	Stu::showClassName();
	Stu::$calssName='ddd';
	Stu::showClassName();