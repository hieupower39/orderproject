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
                $_SESSION["user"]=$this->username;
            }
            else{
                $_SESSION["auth"]="Wrong username or password";
            }
            echo "<script>history.back()</script>";
        }


        public function logout()
        {
            session_destroy();
            echo "<script>history.back()</script>";
        }
    }
