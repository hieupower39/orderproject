<?php

class UserController extends BaseController
{
	private $userModel;
	private $billModel;
	public function __construct()
	{
		$this->model('UserModel');
		$this->userModel = new UserModel;
		$this->model('BillModel');
		$this->billModel = new BillModel;
	}
	public function index() 
	{	
		if(!isset($_SESSION["user"])){
			header("location: index.php");
		}
		$user_id = $this->userModel->findUserID($_SESSION["user"]);
		$bills = $this->billModel->getBillByUser($user_id);
		return $this->view('home.users.index', [
			'pageTitle' => 'Trang danh danh sách user',
			'bills' => $bills,
		]);
	}	

}