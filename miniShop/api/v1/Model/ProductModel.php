<?php

namespace miniShop\Model;


use miniShop\App;
use miniShop\MyPDO;

class ProductModel
{


    private $category ;
    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function GetAllByPagination($start, $limit)
    {
        return MyPDO::doSelect("SELECT * FROM products LIMIT $start, $limit", []);
    }

    public function GetIndex() {

        $categories = $this->category->GetIndexCategories();
        $response = array();
        foreach ($categories as $category) {
            $category['products'] = $this->GetProductByCategoryID($category["categoryID"], 0,3);
            array_push($response , $category);
        }
       return $response;
    }
    public function GetProductByCategoryID($categoryID, $start,  $limit) {
        return MyPDO::doSelect("SELECT * FROM products WHERE categoryID = ?  LIMIT $start, $limit", [$categoryID]);
    }
    public function GetProductByID($productID) {
        $product =  MyPDO::doSelect("SELECT * FROM products WHERE productID = ? ", [$productID], true, false);
        $product["categoryModel"] = $this->category->GetCategoryByID($product["categoryID"]);
        return $product;
    }
}