<?php

class man{
    // 成员变量
    public static $manCount=0; // 静态变量
    var $name;
    var $color;
    var $age;
    // 成员函数
    function eat(){

        echo $this->name."在吃清真饭<br>";
    }

    public function __construct($name="",$color="黄色",$age=0){
        
        // man::$manCount+=1;
        self::$manCount+=1;
        $this->name= $name==""? ('man'.self::$manCount) : $name;
        $this->color=$color;
        $this->age=$age;
        
        echo "{$this->name}被创造<br>";
    } 

}










?>