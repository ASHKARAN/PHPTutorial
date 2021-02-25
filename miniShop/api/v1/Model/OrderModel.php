<?php

namespace miniShop\Model;


use miniShop\App;
use miniShop\MyPDO;

class OrderModel
{



    public function __construct()
    {

    }


    public function Register($userID , $orderAmount) {
        $order = MyPDO::doQuery("INSERT INTO orders (userID , orderAmount) VALUES (? , ?) ",
           [$userID, $orderAmount]);
        return MyPDO::getLastInsertId(MyPDO::getInstance());
    }

    public function RegisterOrderProducts($orderID, $productID, $productQuantity, $productPrice) {
        $order = MyPDO::doQuery("INSERT INTO orderProducts (orderID, productID, productQuantity, productPrice) VALUES (? , ?, ? , ?) ",
            [$orderID, $productID, $productQuantity, $productPrice]);
        return MyPDO::getLastInsertId(MyPDO::getInstance());
    }
    public function GetOrderByID($orderID) {
        return MyPDO::doSelect("SELECT * FROM orders WHERE orderID = ? ",
            [$orderID], false, false);
    }

}