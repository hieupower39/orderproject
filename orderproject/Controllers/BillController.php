<?php

class BillController extends BaseController
{
    private $billModel;
	private $cartModel;
	private $productModel;
	private $userModel;
	public function __construct()
	{
		$this->model('BillModel');
		$this->billModel = new BillModel;
		$this->model('CartModel');
		$this->cartModel = new CartModel;
		$this->model('ProductModel');
		$this->productModel = new ProductModel;
		$this->model('UserModel');
		$this->userModel = new UserModel;
	}
	public function index(){
		$id = $_REQUEST["id"];
		$cart = $this->cartModel->detailBill($id);
		$bill=$this->billModel->getBill($id);
		$logs=$this->billModel->getLog($id);
		$products=$this->productModel->getAll();
		if(isset($_SESSION["admin"])){
			return $this->view('admin.bills.index', [
				'bill' => $bill,
				'cart' => $cart,
				'products'=>$products,
				'logs' => $logs
			]);
		}
		else if(isset($_SESSION["user"])){
			if($this->checkBill($id)==1)
				return $this->view('home.bill.index', [
						'bill' => $bill,
						'cart' => $cart,
						'products'=>$products,
						'logs' => $logs
				]);
			else{
				header("location: index.php?controller=user");
			}
		}
		else{
			header("location: index.php");
		}
	}
	public function changestatic()
	{
		$this->billModel->updateBillStatic($_POST["id"], $_POST["static"]);
	}
	public function update(){
		$id=$_POST["id"];
		$cart = json_decode($_POST["cart"], true);
		$name=$_POST["name"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$this->billModel->updateBill($id, $cart, $name, $address, $phone);
	}
	public function delete(){
		$this->billModel->deleteBill($_POST["bill_id"]);
		return header("location: index.php?controller=admin");
	}
	public function checkBill($id){
		$user = $this->userModel->findUserID($_SESSION["user"]);
		return $this->billModel->billCheck($user, $id);
	}
	public function updatelog(){
		var_dump($this->billModel->updateLog($_POST['id'], $_POST['date'], $_POST['message'], $_POST['static']));
	}
}