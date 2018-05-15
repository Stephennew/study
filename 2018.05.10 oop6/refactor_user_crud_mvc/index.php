<?php
    //$p = $_GET['p']??''
    $c = $_GET['c']??'User';//c控制器
    $a = $_GET['a']??'index';//a方法
    $c = "\\Controller\\{$c}Controller"; //这里需要转义\\
    $Controller = new $c(); //c控制器
    $Controller->$a();//a方法 可变方法

    //在PHP中,任何东西都可以用变两代替




    /*
        类的自动加载

    */
    function __autoload($class_name){
        $class_name = str_replace('\\','/',$class_name);
       //var_dump($class_name);
        require "./{$class_name}.class.php";
    }

