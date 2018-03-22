<?php
abstract class Animal{

    public static $objsCount=0; // 静态初始值
    public $name;
    public $weight; // 单位 kg
    public $color;
        // 每个方法 必须被实现
    abstract public function eat();
    // abstract public function drink();
    abstract public function run();
    // abstract public function jump();
    // abstract public function sleep();
}







?>