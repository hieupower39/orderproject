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
		return $this->view('frontend.products.index', [
			'products' => $products
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
}