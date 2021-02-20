<?php
namespace miniShop\Controller;
use miniShop\App;
use miniShop\MyPDO;

class Users
{


    public function Login($json) {

        App::hasKeys($json, ["email", "password"]);
    }
}

