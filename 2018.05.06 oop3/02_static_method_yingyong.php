<?php 
	
	/*
		如果一个类的方法中没有$this ,将该方法设置为静态方法


	*/

	class Util{
		public static function dump($str){
			echo '<pre>';
			var_dump($str);
			echo '<pre>';
		}

		public static function p($str){
			echo $str,'<br/>';
		}
	}
 ?>