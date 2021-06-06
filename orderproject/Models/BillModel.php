<?php

class BillModel extends BaseModel{
    const TABLE = 'tbl_bill';
    public function getAll()
    {
       return $this->all(self::TABLE);
    }
    public function findLastBill()
    {   
        $bills = $this->getAll();
        if($bills == null){
            return 0;
        }
        return $bills[sizeof($bills)-1]["bill_id"]+1;
    } 
    public function findLastLog(){
        $logs = $this->all('tbl_log');
        if($logs==null){
            return 0;
        }
        return $logs[sizeof($logs)-1]["log_id"]+1;
    }
    public function createBill($name, $address, $phone, $username)
    {
        $bill_id = $this->findLastBill();
        $user_id = $this->findUserID($username);
        $this->addBill($bill_id, $user_id, $name, $address, $phone);
        return $bill_id;
    }
    public function getBill($id){
        return $this->getByID($id, self::TABLE);
    }

    public function updateBill($id, $cart, $name, $address, $phone){
        $this->updateBillInfor($id, $name, $address, $phone);
        $this->delete("tbl_cart", "bill_id", $id);
        foreach($cart as $item){
            $this->addToCart($id, $item["product_id"], $item["amount"]);
        }
    }
    public function deleteBill($id){
        $this->delete('tbl_log', 'bill_id', $id);
        $this->delete('tbl_cart', 'bill_id', $id);
        $this->delete('tbl_bill', 'bill_id', $id);
    }

    public function getBillByUser($user_id){
        return $this->getByValue(self::TABLE, 'user_id', $user_id);
    }
    public function billCheck($user,$id){
        return $this->checkTwoValue(self::TABLE, "user_id", "bill_id", $user , $id);
    }
    public function getLog($id){
        return $this->getByID($id, 'tbl_log');
    }
    public function updateLog($bill_id, $log_date, $log_message, $log_static){
        $log_id=$this->findLastLog();
        return $this->log($log_id, $bill_id, $log_date, $log_message, $log_static);
    }
}