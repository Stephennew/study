<?php 

	class stu{
		public $name;
		public static $class='1班';
		const SHOOL_NAME = '源码时代';

		public function __construct($name){
			$this->name=$name;
			define("USA", '中国');
		}
		public static function study(){
			print(self::SHOOL_NAME.self::$class);
		}
	}
	$stu1 = new stu('dd');
	print stu::$class.'<br>';
	stu::study();
	echo USA;
	$stu1->study(); //方法访问不分静态和实例,但是静态方法里面不能有$this
	$stu1::study();

	class Goods{
		public	$name;
		public $price;

		public function __construct($name,$price){
			$this->name =$name;
			$this->price =$price;
		}
		public function showPrice(){
			print($this->name.$this->price);
		}
	}
	class book extends Goods{
		public $author;

		public function __construct($name,$price,$author){

			parent::__construct($name,$price);
			$this->author = $author;
		}

	}

	class iphone extends Goods{
		public $ios;

		public function __construct($name,$price,$ios){
			parent::__construct($name,$price);
			$this->ios = $ios;
		}

		public function showPrice(){
			print($this->name.$this->price.$this->ios); 
		
		}
	}


	$stu = new book('wang',22,'哈哈');
	$stu->showPrice();

	$iphone = new iphone('嘻嘻嘻',33,'哈哈');
	$iphone->showPrice();

 ?>