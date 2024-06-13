<?php
//load file model

include "../Project-petcare-php/user/Model/HomeModel.php";
class HomeController extends Controller
{
    use HomeModel;
    public function __construct()
    {
    }
    public function index()
    {
        //load view
        $this->loadView("../../Project-petcare-php/user/Views/HomeView.php");
    }
}
