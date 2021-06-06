<?php

class AdminController extends BaseController
{
	private $billModel;
	public function __construct()
	{
		$this->model('BillModel');
		$this->billModel = new BillModel;
	}
	public function index()
	{   
		if(!isset($_SESSION["admin"])){
			header("location: index.php");
		}
        $bills=$this->billModel->getAll();
		return $this->view('admin.management.index', [
            "bills"=>$bills
		]);
	}

	public function show()
	{
		echo $this->productModel->findById(1);
		echo __METHOD__;
	}

	public function addToCart(){
		echo "
			
			<script>history.back()</script>
			";
	}
	public function chart(){
		if(!isset($_SESSION["admin"])){
			header("location: index.php");
		}
        $static0=$this->billModel->countStatic(0);
		$static1=$this->billModel->countStatic(1);
		$static2=$this->billModel->countStatic(2);
		$static3=$this->billModel->countStatic(3);
		$static4=$this->billModel->countStatic(4);
		return $this->view('admin.charts.index', [
            "static0"=>$static0,
			"static1"=>$static1,
			"static2"=>$static2,
			"static3"=>$static3,
			"static4"=>$static4
		]);
	}
}