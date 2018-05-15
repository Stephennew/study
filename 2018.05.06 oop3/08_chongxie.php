<?php 
	require '../publicUtil.php';
	/*
	重写:
	当父类中的方法不满足需求的时候,我们在子类中重写该方法

	多态: 继承  重写  
	多态,调用相同的方法得到不同的结果

	*/

	class Iphone4{
		public function call(){
			Util::p('打电话----');
		}
	}

	class Iphone5 extends Iphone4{
		public function call(){
			parent::call();
			Util::p('录音+-------');
		}
	}

	class Iphone6 extends Iphone5{
		public function call(){
			parent::call();
			Util::p('视屏+++++++++++++');
		}
	}
	class Person{
		public function usePhone($phone){
			$phone->call();
		}
	}

	$person = new Person();

	$iphone4 = new Iphone4();
	$iphone5 = new Iphone5();
	$iphone6 = new Iphone6();

	$person->usePhone($iphone6);

 ?>