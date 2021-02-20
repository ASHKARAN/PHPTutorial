<?php

include "04-Class.php";


class Inheritance extends ClassName  {


    public function __construct($language = "PHP")
    {
        parent::__construct($language);
        parent::setTest(" is very good");
        parent::function3();
        parent::printVar1();

    }


}

$in = new Inheritance("C#");
