<?php
namespace miniShop\Model;

use Ahc\Jwt\JWT;
use Ahc\Jwt\JWTException;
use miniShop\App;
use miniShop\Config;
use miniShop\MyPDO;

class BasketModel
{


    public function getProductFromBasket($productID , $userID) {

        return MyPDO::doSelect("SELECT * FROM basket WHERE productID = ? AND userId = ?",
        [$productID, $userID], true);
    }

    public function addProductToBasket($productID , $userID, $count) {

        return MyPDO::doQuery("INSERT INTO basket (userID, productID , productQuantity) VALUES (? , ? , ?)",
            [$userID, $productID, $count]);
    }
    public function updateProductInBasket($productID , $userID, $count) {
        return MyPDO::doQuery("UPDATE basket SET   productQuantity = ? WHERE userID = ? AND productID = ?   ",
            [$count, $userID, $productID ]);
    }

    public function getBasket($userID) {
        return MyPDO::doSelect("SELECT * FROM basket WHERE userID = ? " , [$userID]);
    }

}