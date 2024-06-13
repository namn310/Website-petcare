<?php
include "Model/loginModel.php";
class LoginController extends Controller
{
    use loginModel;
    public function index()
    {
        $this->loadView("pages-login.php");
    }
    public function login()
    {
        $this->modelLogin();
        header("location:index.php");
    }
    public function logOut()
    {
        unset($_SESSION["admin_email"]);
        header("Location:index.php");
    }
}
