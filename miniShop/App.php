<?php
namespace miniShop;
class App {


    public static function loadAllClasses($directory) {
        if(is_dir($directory)) {
            $scan = scandir($directory);
            unset($scan[0], $scan[1]); //unset . and ..
            foreach($scan as $file) {
                if(is_dir($directory."/".$file)) {
                    self::loadAllClasses($directory."/".$file);
                } else {
                    if(strpos($file, '.php') !== false) {
                        include_once($directory."/".$file);
                    }
                }
            }
        }
    }

    public static function hasKeys($json, $keys) {
        foreach ($keys as $item) {
            if(!isset($json->$item)) {
               self::out("password not found in request");
                exit;
            }
        }
    }

    public static function out($data, $httpStatusCode = 400) {
           http_response_code($httpStatusCode);
            echo json_encode([
               "success" => $httpStatusCode < 300,
               "error"   => $httpStatusCode < 300?null:$data,
               "data"    => $httpStatusCode < 300?$data:null,
            ]);
            exit;
    }


}