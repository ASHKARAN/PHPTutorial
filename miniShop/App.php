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
                echo "$item not found";
                exit;
            }
        }

    }



}