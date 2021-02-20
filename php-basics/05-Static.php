<?php


class staticClass {

    public $var1 = 1;
    public $var2 = 2;
    public $var3 = 3;

    public static $var4 = 4;



    public function printVar1() {
        echo "$this->var1 , $this->var2  , $this->var3, " . self::$var4;
    }

    public function printVar2() {

    }

    public static function printVar3() {
        echo self::$var4;
    }


}




//
//$static = new staticClass();
//$static->printVar1();
//echo "\n" .  staticClass::$var4;