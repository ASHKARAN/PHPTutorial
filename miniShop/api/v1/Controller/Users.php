<?php
namespace miniShop\Controller;
use miniShop\App;
use miniShop\Model\UserModel;
use miniShop\MyPDO;

class Users
{


    public function Register($json) {
        App::hasKeys($json, ["email", "password"]);
        $userModel = new UserModel();
        $user = $userModel->createUser($json->email, $json->password);
        App::out($user, 200);
    }

    public function Login($json) {
            App::hasKeys($json, ["email", "password"]);
    }



}

