<?php

class UserModel extends BaseModel
{
    const TABLE = 'tbl_user';
    public function getAll(){
        return $this->all(self::TABLE);
    }
    public function findById($id)
    {
        return __METHOD__;
    } 
    public function findUser($username, $pwd){
        return $this->check($username, $pwd);
    }
}