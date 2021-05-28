<?php

class BaseModel extends Database
{
    protected $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function all($table)
    {   
        $sql = "SELECT * FROM ${table}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }

    public function find($id)
    {

    }

    public function check($username, $pwd)
    {
        $sql = "SELECT * FROM tbl_user WHERE user_name = '${username}' AND user_password = '${pwd}'";
        $query = $this->_query($sql);
        $row=mysqli_fetch_assoc($query);
        if($row){
            return 1;
        }
        return 0;
    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }

}