<?php
include "Model/UserModel.php";
class UserController extends Controller
{
    public function index()
    {
        $this->loadView("users-profile.php");
    }
    public function changepass()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->changePass($id);
        header("Locationindex.php?controller=user");
    }
}
