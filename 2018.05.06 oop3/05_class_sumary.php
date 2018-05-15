<?php 
	
	require '../publicUtil.php';
	/*
		总结类中的内容
			属性:

			静态属性(类属性) 实例属性(非静态属性) 类常量

			方法: 

			实例方法(非静态方法) 静态方法(类方法)

	*/

	class Foo{
		public $name;
		public static $className = 'php';
		const SCHOOL_NAME = '源码';
		public function __construct($name){
			$this->name = $name;
		}
		public function showName(){
			Util::p($this->name);
		}
		public static function showSchoolName(){
			Util::p(self::SCHOOL_NAME);
		} 
	}

	$foo = new Foo('王');
	$foo->showName();

	Util::p(Foo::$className);
	Util::p(Foo::SCHOOL_NAME);

	$foo->showName();
	Foo::showSchoolName();


 ?>