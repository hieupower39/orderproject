<?php

class ProductModel extends BaseModel{
    const TABLE = 'tbl_product';
    public function getAll()
    {
       return $this->all(self::TABLE);
    }
    public function findById($id)
    {
        return __METHOD__;
    } 
}