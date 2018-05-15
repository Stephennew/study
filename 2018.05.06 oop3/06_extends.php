<?php 
	require '../publicUtil.php';
	/*
		
		继承 extends;

		定义:一个B类对象可以直接使用另外一个A类对象中的属性和方法,即B类继承A类

		为什么使用继承

			继承是类与类之间产生关系,主要是让代码达到了重用,复用

		子类(派生类):继承下来的来
		父类(基类):被继承的类就是父类



	*/


		class A{
			public $a='A';
		}
		class B extends A{
			public $b = 'B';
		}

		$b = new B();
		Util::dump($b);


		class Goods{
			public $price;
			public $name;
		}
		class Book extends Goods{
		
			public $author;
			public $publisher;

		}

		class Phone extends Goods{
	
			public $brand;
			public $os;

		}
		$book  = new Book();
		$phone = new Phone();
		Util::dump($book);
		Util::dump($phone);

 ?>