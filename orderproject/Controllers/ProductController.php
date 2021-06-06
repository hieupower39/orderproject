<?php

class ProductController extends BaseController
{
	private $productModel;
	public function __construct()
	{
		$this->model('ProductModel');
		$this->productModel = new ProductModel;
	}
	public function index()
	{
		$products = $this->productModel->getAll();
		return $this->view('home.products.index', [
			'products' => $products
		]);
	}
	public function addToCart(){
		echo "
			
			<script>history.back()</script>
			";
	}
}