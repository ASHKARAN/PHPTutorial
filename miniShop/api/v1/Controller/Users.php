<?php
namespace miniShop\Controller;
use miniShop\App;
use miniShop\Model\UserModel;

class Users
{

    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function Register($json) {
        App::hasKeys($json, ["email", "password"]);

        $user = $this->userModel->createUser($json->email, $json->password);
        App::out($user, 200);
    }

    public function Login($json) {
            App::hasKeys($json, ["email", "password"]);
            $user = $this->userModel->login($json->email, $json->password);
            if($user == null) {
                App::out("User not found with this email and password");
            }
            App::out($user, 200);
    }



}

