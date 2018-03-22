<?php

class robot
{   
    public $test = '';
    public $name;
    public $color;
    public $elect;
    public $isOn = true;
    public static $rCount=0; // 静态初始值
        // 怎么设置 使 $isOn == true 时

    public function cook(){
        if($this->isOn == true){
            echo "{$this->name}在煮饭<br>";
        }else {
            echo "{$this->name}未启动,不能煮饭<br>";
        }
    }

    function clean(){
        if($this->isOn == true){
            echo "{$this->name}在打扫<br>";
        }else {
            echo "{$this->name}未启动,不能打扫<br>";
        }
            
    }

    function calc($m,$n){
        echo "{$this->name}正在计算<br>";
        $sum =0;
        for($i=$m;$i<=$n;$i++)
            $sum+=$i;
        echo "{$sum}<br>";
    }

    function on(){
        //z
        if(!$this->isOn)
            $this->isOn=!$this->isOn;
    }
    function off(){
        if($this->isOn)
            $this->isOn=!$this->isOn;
    }
    function tobind($obj_car){

        $obj_car->bind($this);

    }

    public function __construct($name="",$color="白色",$elect=100,$isOn=0){
        
        robot::$rCount+=1;
        $this->name= $name==""? ('robot'.robot::$rCount) : $name;
        echo "{$this->name}被创造<br>";
        $this->color=$color;
        $this->elect=$elect;
        $this->isOn=$isOn;
        
    }

    function __clone(){
        echo "{$this->name}被克隆<br>";
        robot::$rCount+=1;
        // $name = "大明";2
    }

    function __destruct(){
        echo "{$this->name}被销毁<br>";
        robot::$rCount-=1;
    }
        // 没有 该 魔术变量 会报错
    function __get($n){
        return "$n,不存在<br>";
    }

}




?>
