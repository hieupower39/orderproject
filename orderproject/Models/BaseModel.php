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

    public function getBill($user_id){
        $sql = "SELECT * FROM tbl_bill WHERE user_id = ${user_id}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }

    public function findUserID($username){
        $sql = "SELECT user_id FROM tbl_user WHERE user_name = '${username}'";
        $query = $this->_query($sql);
        $row=mysqli_fetch_assoc($query);
        return $row["user_id"];
    }
    public function addBill($id, $user_id, $name, $address, $phone){
        $sql = "INSERT INTO tbl_bill VALUES(${id},${user_id},'${name}','${address}','${phone}','')";
        $this->_query($sql);
    }

    public function addToCart($bill_id, $product_id, $amount){
        $sql = "INSERT INTO tbl_cart VALUES(${bill_id},${product_id},${amount})";
        $this->_query($sql);

    }

    public function isAdmin($username){
        $sql = "SELECT user_admin FROM tbl_user WHERE user_name = '${username}'";
        $query = $this->_query($sql);
        $row=mysqli_fetch_assoc($query);
        return $row["user_admin"];
    }

    public function updateBillStatic($bill_id, $bill_static){
        $sql = "UPDATE tbl_bill SET bill_static = ${bill_static} WHERE bill_id=${bill_id}";
        $this->_query($sql);
    }

    public function getByID($id, $table){
        $col = substr($table,4)."_id";
        if($table=="tbl_cart"||$table=="tbl_log"){
            $col = "bill_id";
        }
        $sql = "SELECT * FROM ${table} WHERE ${col}=${id}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }

    public function getByValue($table, $where, $value){
        $sql = "SELECT * FROM ${table} WHERE ${where}=${value}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }

    public function detailBill($id){
        $sql = "SELECT tbl_cart.product_id, tbl_product.product_name, tbl_product.product_cost, tbl_cart.amount, (tbl_cart.amount*tbl_product.product_cost) as 'total', tbl_product.product_img FROM tbl_cart, tbl_bill, tbl_product WHERE tbl_bill.bill_id=tbl_cart.bill_id and tbl_product.product_id=tbl_cart.product_id and tbl_bill.bill_id=${id}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }

    public function checkTwoValue($table, $where1, $where2, $value1, $value2)
    {
        $sql = "SELECT * FROM ${table} WHERE ${where1}='${value1}' AND ${where2}='${value2}'";
        $query = $this->_query($sql);
        $row=mysqli_fetch_assoc($query);
        if($row){
            return 1;
        }
        return 0;
    }

    public function updateBillInfor($id, $name, $address, $phone)
    {
        $sql="UPDATE tbl_bill SET name='${name}', address='${address}', phone = '${phone}' WHERE bill_id=${id}";
        return $this->_query($sql);
        
    }

    public function delete($table, $where, $value)
    {
        $sql="DELETE FROM ${table} WHERE ${where}=${value}";
        return $this->_query($sql);
    }

    public function log($log_id, $bill_id, $log_date, $log_message, $log_static){
        $sql = "INSERT INTO tbl_log VALUES(${log_id},${bill_id},'${log_date}','${log_message}','${log_static}')";
        return $this->_query($sql);
    }

    public function countStatic($static){
        $sql="SELECT count(bill_static) as 'count' FROM tbl_bill WHERE bill_static = ${static}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data[0]["count"];
    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }



}