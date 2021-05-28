<?php

class CartController extends BaseController
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
		return $this->view('frontend.carts.index', [
			'products' => $products
		]);
	}

	public function add()
	{
		echo __METHOD__;
	}
}