<?php
include "../Project-petcare-php/user/Model/RegisterModel.php";
class RegisterController extends Controller
{
    use RegisterModel;

    public function index()
    {
        $this->loadView("../../Project-petcare-php/user/Views/sign_in.php");
    }
    public function registerPost()
    {
        $this->modelRegister();
        header("location:index.php?controller=account");
    }
}
