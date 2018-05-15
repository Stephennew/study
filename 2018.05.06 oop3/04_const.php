<?php 
	require '../publicUtil.php';
	/*

	在类中始终保持不变的属性值就定义为 类常量
	*/

	//const 类常量 = "值"
	/*特点:
		1.常量名大写;
		2.一定要赋初始值
		3.没有public 修饰,没有$

	*/

		class Stu{

			public $name;
			public $age;
			public static $claaName = 'php';
			const SCHOOL_NAME = "源码";

			public static function showSchool(){
				Util::p(self::SCHOOL_NAME);
			} 
		}

		define("DN", 'dd');
		Util::p(DN);
		Stu::showSchool();


	/*


	const 的特殊用法

	1.const 即可以在类的里面用于定义类常量,也可以在类的外面定义一个普通的常量(与 define 样的效果)

	2.如果在类的方法里面,只能通过deifne 定义常量,不能通过const定义常量
	*/


	define('USA', '美国');
	Util::p(USA);
	const PRC = '中国';
	Util::p(PRC);

	class Stus{
		const PRC = '中国';
		public static function test(){
			//定义常量
			//const DD = 'dd';//类的方法中不能使用const定义常量,使用define定义
			define('DD', 'dd');

		}
	}

	Stus::test();
	Util::p(DD);
 ?>