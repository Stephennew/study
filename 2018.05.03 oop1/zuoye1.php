<?php 
	
	class person{
		public $name='王海桃';
		public $sex='男';
		public $age='25';
		public $height='170cm';
		public $wight='70kg';
		
		public function study(){
			print $this->name.'正在学习'.'<br>';
		}
		public function intro(){
			print '介绍:'.$this->name.$this->sex.$this->age.$this->height.$this->wight.'<br>';
		}
		public function run(){
			print $this->name.'正在跑步!';
		}
	}

	$person1 = new person();
	$person1->study();
	$person1->intro();
	$person1->run();

 ?>