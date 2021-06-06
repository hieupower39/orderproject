<?php
    class LoginController extends BaseController
    {
        private $username;
        private $pwd;
        private $userModel;
        public function __construct()
        {
            $this->model('UserModel');
            $this->userModel = new UserModel;
        }
        public function index()
        {   
            $this->username = $_POST['username'];
            $this->pwd = md5($_POST['pwd']);
            $verify = $this->userModel->findUser($this->username,$this->pwd);
            if($verify==1){
                $admin = $this->userModel->isAdmin($this->username);
                if($admin==1){
                    $_SESSION["admin"]=$this->username;
                    return header("location: index.php?controller=admin");
                }
                else  
                    $_SESSION["user"]=$this->username;
            }
            else{
                echo "<script>alert('Đăng nhập thất bại')</script>";
            }
            echo "<script>history.back()</script>";
        }


        public function logout()
        {   
            if($_REQUEST["param"]=="admin"){
                unset($_SESSION["admin"]);
                return header("location: index.php");
            }
            else unset($_SESSION["user"]);
            echo "<script>history.back()</script>";
        }
    }
