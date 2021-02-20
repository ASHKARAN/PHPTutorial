<?php


$test = array(
    "param1" => 1 ,
    "param2" => "hello" ,
    "param3" => true ,
    "param4" =>  10.2 ,
    "param5" => array("hello" , "world" , "i'm" , "trying" , "....")
);


echo json_encode($test);