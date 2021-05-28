<?php

class UserController extends BaseController
{
	private $userModel;
	public function __construct()
	{
		$this->model('UserModel');
		$this->userModel = new UserModel;
	}
	public function index() 
	{	
		
		$users = $this->userModel->getAll();
		return $this->view('frontend.users.index', [
			'pageTitle' => 'Trang danh danh sách user',
			'users' => $users
		]);
	}	

	public function show()
	{
		echo $this->userModel->findById(1);
		echo __METHOD__;
	}
}