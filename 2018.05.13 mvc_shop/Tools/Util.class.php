<?php 
	namespace Tools;
	class Util{

		public static function dump($str){
			echo ('<pre/>');
			var_dump($str);

		}

		public static function p($str){
			echo $str,'<br/>';
		}

		/*跳转*/
		public static function jump($url){
			header("Location: $url"); //跳转到一个新的地址
		}


		public static function my_jump($msg,$time,$url){
			echo $msg;
			header("Refresh: $time; url=$url"); //延迟转向 也就是隔几秒跳转
			die;
		}
	
	}
