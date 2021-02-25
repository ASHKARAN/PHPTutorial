<?php
namespace miniShop\Model;

use Ahc\Jwt\JWT;
use Ahc\Jwt\JWTException;
use miniShop\App;
use miniShop\Config;
use miniShop\MyPDO;

class UserModel
{

    public static $userInstance = null;
    public function createUser($email, $password) {

        $user =  MyPDO::doSelect("SELECT userID FROM users WHERE email = ? ",
            [$email], false, false);

        if($user != null) {
            App::out("Email already exists");
        }


        $password = md5(sha1( Config::$PASSWORD_SALT . $password));
        MyPDO::doQuery("INSERT INTO users (email, password) VALUES (? ,? )",
        [$email, $password]);

        return MyPDO::doSelect("SELECT userID, email FROM users WHERE userID = ? ",
        [MyPDO::getLastInsertId(MyPDO::getInstance())], false, false);

    }
    public function login($email, $password) {

        $password = md5(sha1( Config::$PASSWORD_SALT . $password));
       return  MyPDO::doSelect("SELECT userID , email FROM users WHERE email = ? AND password = ? ",
            [$email, $password], false, false);
    }

    public function getUserByID($userID) {

       return  MyPDO::doSelect("SELECT userID , email FROM users WHERE userID = ? ",
            [$userID], false, false);
    }

    public function loginByAuthorizationToken($autoErrorResponder = true)
    {
        $headers = getallheaders();
        foreach ($headers as $key => $value) {
            if($key == "Authorization") {
                $jwt = new JWT(Config::$JWT_SECRET);
               try {
                   $token =  $jwt->decode($value);
                   self::$userInstance = $this->getUserByID($token['userID']);
                   return true;
               }
               catch (\Exception $e) {  }
            }
        }
        if($autoErrorResponder) {
            App::out("Wrong Token");
        }
        return  false;
    }
}