<?php
include "Model/ProductModel.php";

class HomeController extends Controller
{
    use ProductModel;

    public function __construct()
    {
    }
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {

            //load view
            $this->loadView("HomeAdmin.php");
        }
    }
}
