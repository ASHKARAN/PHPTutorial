<?php
namespace miniShop;

class Router {

    public function __construct($route, $action)
    {



        $json_str = file_get_contents('php://input');
        $json = json_decode($json_str);
        try {
            $class = "miniShop\Controller\\".$route ;
            $instance = null;
            if(class_exists($class))   {
                $instance = new $class(false);
                if(method_exists($instance, $action))
                    $instance->{$action}($json);
                else {
                    echo "action not exists";
                }

            }
            else {
                echo "route not exists";

            }
        }
        catch(\Exception $exc) {
            echo json_encode($exc);
        }





    }
}