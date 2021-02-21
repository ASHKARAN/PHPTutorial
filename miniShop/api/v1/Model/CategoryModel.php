<?php

namespace miniShop\Model;


use miniShop\MyPDO;

class CategoryModel
{


    public function GetIndexCategories()
    {
        return MyPDO::doSelect("SELECT * FROM categories WHERE main = 1", []);
    }



    public function GetCategoryByID($categoryID)
    {
        return MyPDO::doSelect("SELECT * FROM categories WHERE categoryID = ?", [$categoryID], true, false);
    }


}