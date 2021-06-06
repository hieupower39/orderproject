<?php

class CartController extends BaseController
{	
	private $productModel;
	private $cartModel;
	private $billModel;
	public function __construct()
	{
		$this->model('ProductModel');
		$this->productModel = new ProductModel;
		$this->model('BillModel');
		$this->billModel = new BillModel;
		$this->model('CartModel');
		$this->cartModel = new CartModel;
	}
	public function index()
	{	
		$products = $this->productModel->getAll();
		return $this->view('home.carts.index', [
			'products' => $products,
		]);
	}

	public function checkout()
	{	
		$this->cart= json_decode($_POST['json'], true);
		$bill_id = $this->billModel->createBill($_POST['name'],$_POST['address'],$_POST['phone'],$_SESSION['user']);
		$this->billModel->updateLog($bill_id, $_POST['date'], 'Đã đặt hàng', 0);
		$this->cartModel->createCart($bill_id, $this->cart);
	}
}