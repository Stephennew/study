<?php 
	
	require '../publicUtil.php';
/*
	$this 代表谁的最终版本

		1,谁调用该方法,该方法中的$this 就代表谁

		2.通过静态的方式调用被重写的方法,被重写的方法中的$this代表调用处的$this;

		总结:哪个 对象 触发 了这些方法,这些方法中的$this就是哪个对象
*/

	class A{
		public function showA(){
			Util::dump($this);
		}
	}

	class B extends A{
		public function showA(){
			//A::showA();
			parent::showA(); //哪个对象触发这些方法,这些方法中的$this就是哪个对象
		}
	}

	$a = new A();
	$a->showA();
	$b = new B();
	$b->showA();


 ?>