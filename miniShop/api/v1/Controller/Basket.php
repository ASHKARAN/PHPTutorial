<?php
namespace miniShop\Controller;


use miniShop\App;
use miniShop\Model\BasketModel;
use miniShop\Model\ProductModel;
use miniShop\Model\UserModel;

class Basket
{


    private $productModel;
    private $userModel;
    private $basketModel;
    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->userModel  = new UserModel();
        $this->basketModel  = new BasketModel();
        $this->userModel->loginByAuthorizationToken(true);
    }


    public function AddToBasket($json) {
       App::hasKeys($json, ["productID", "count"]);
        $count = intval($json->count);
        if($count == 0) {
            App::out("Count must be greater than 0");
        }
       $product = $this->productModel->GetProductByID($json->productID);
       if($product['quantity'] < $json->count) {
           App::out("Count is greater than quantity");
       }
       $productInBasket = $this->basketModel->getProductFromBasket($json->productID, UserModel::$userInstance['userID'] );
       if(count($productInBasket)===1) {
           $productInBasket = $productInBasket[0];
           if($count + $productInBasket['productQuantity'] > $product['quantity']) {
               App::out("new count is greater than quantity");
           }
           $this->basketModel->updateProductInBasket($json->productID, UserModel::$userInstance['userID'], $count + $productInBasket['productQuantity']);
           App::out($this->basketModel->getBasket( UserModel::$userInstance['userID']) , 200);
       }
       else {
           $this->basketModel->addProductToBasket($json->productID, UserModel::$userInstance['userID'], $count);
           App::out($this->basketModel->getBasket( UserModel::$userInstance['userID']) , 200);
       }

    }
    public function RemoveFromBasket($json) {
       App::hasKeys($json, ["productID"]);
       $this->basketModel->removeFromBasket(UserModel::$userInstance['userID'] , $json->productID);
       App::out($this->basketModel->getBasket( UserModel::$userInstance['userID']) , 200);
    }

}