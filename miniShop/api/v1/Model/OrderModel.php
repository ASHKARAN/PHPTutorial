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
       MyPDO::doQuery("INSERT INTO orders (userID , orderAmount) VALUES (? , ?) ",
           [$userID, $orderAmount]);
        return MyPDO::getLastInsertId(MyPDO::getInstance());
    }

    public function RegisterOrderProducts($orderID, $productID, $productQuantity, $productPrice) {
        MyPDO::doQuery("INSERT INTO orderProducts (orderID, productID, productQuantity, productPrice) VALUES (? , ?, ? , ?) ",
            [$orderID, $productID, $productQuantity, $productPrice]);

    }
    public function GetOrderByID($orderID) {
        return MyPDO::doSelect("SELECT * FROM orders WHERE orderID = ? ",
            [$orderID], false, false);
    }
    public function GetOrderProducts($orderID) {
        return MyPDO::doSelect("SELECT * FROM orderProducts WHERE orderID = ? ",
            [$orderID]);
    }

}