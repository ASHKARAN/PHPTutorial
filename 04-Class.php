<?php


class ClassName {


    private $test = "hello World";
    public $var1  = "var1";
    private $language = "PHP";


    public function __construct($language = "PHP")
    {

        $this->language = $language;
        echo $this->test ;
    }


    private function function1() {

    }


    private function function2() {

    }


    public function function3() {

        echo $this->test;
    }

    public function setTest($test) {
        $this->test = $this->language . $test;
    }


}



$className = new ClassName( );

$className->setTest("  is bad");
$className->function3();

