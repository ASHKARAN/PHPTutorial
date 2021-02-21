<?php
namespace miniShop\Controller;


use miniShop\App;
use miniShop\Model\ProductModel;
use miniShop\Model\UserModel;

class Products
{


    private $productModel;
    public function __construct()
    {
        $this->productModel  = new ProductModel();

    }

    public function GetAll($json) {
        App::hasKeys($json, ["start", "limit"]);
        $start = intval($json->start);
        $limit = intval($json->limit);

        if($limit==0) $limit = 10;
        $products = $this->productModel->GetAllByPagination($start, $limit);
        App::out($products, 200);

    }

    public function GetIndex($json) {

        $response = $this->productModel->GetIndex();
        App::out($response, 200);
    }


    public function GetByID($json) {
        App::hasKeys($json, ["productID"]);
        App::out($this->productModel->GetProductByID($json->productID), 200);
    }

    public function GetByCategory($json) {

    }
}