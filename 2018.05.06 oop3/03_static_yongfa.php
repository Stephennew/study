<?php 
	
	require '../publicUtil.php';

	class Stu{

		public $name;
		public $age;

		public static $className = 'php';

		public function __construct($name,$age){
			$this->name = $name;
			$this->age =$age;
		}
		public function showName(){
			Util::p('不能使用$this');
		}
		public static function showClassName(){
			Util::p(self::$className);
		}
	}

		$stu = new Stu('wang',22);
		Util::p($stu->name);
		Util::p(Stu::$className);
		//通过对象访问静态成员属性
		Util::p($stu::$className);

		$stu->showClassName();
		@Stu::showName();//通过类名访问非静态方法是,该方法中不能有$this

 ?>