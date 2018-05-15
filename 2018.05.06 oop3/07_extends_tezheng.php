<?php 

	require '../publicUtil.php';
	/*
		继承的特征:
			a:单继承-- 一个子类只能有一个父类,一个父类可以有多个子类
			b:通过继承链形式(多层继承);

	*/

		class A{
			public $a = 'A';
		}
		class B extends A{
			public $b = 'B';
		}
		class C extends B{
			public $c = 'C';
		}

		$c = new C();
		Util::dump($c);

		class Goods{
			public $name='dk';

			public function showPrice(){
				Util::p('父类中方法');
			}

		}

		class Book extends Goods{
			public $name = 'xx';

			public function showPrice(){
				//调用父类中被重写的方法
				echo 'd';
				Goods::showPrice();
				echo '1';
				Util::p('子类');
			}
		}

		$book = new Book();
		Util::p($book->name);
		$book->showPrice();

		class Goodss{
			public $name;
			public $price;

			public function __construct($name,$price){
				$this->name = $name;
				$this->price = $price;
			}
			public function showPrice(){
				Util::p($this->name.'售价为:'.$this->price);
			}
		}

		class Books extends Goodss{
			public $author;
			public $publisher;

			public function __construct($name,$price,$author,$publisher){
				//Goods::__construct($name,$price);
				parent::__construct($name,$price);
				$this->author = $author;
				$this->publisher = $publisher;
			}
			public function showPrice(){
				parent::showPrice();
				Util::p($this->author.$this->publisher);
			}
				
		}

		$book = new Books('净瓶没',69,'警用','掩码');
		$book->showPrice();
 ?>