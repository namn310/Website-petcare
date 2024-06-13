<?php
class KhachhangController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("Quanlykhachhang.php");
        }
    }
}
