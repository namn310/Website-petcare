<?php
include("../Project-petcare-php/user/Model/ProductModel.php");
class ProductController extends Controller
{
    use ProductModel;
    public function index()
    {
        $data = $this->modelRead();

        $this->loadView("../../Project-petcare-php/user/Views/product.php", ["data" => $data]);
    }
    public function danhmuc()
    {
        $data = $this->modelRead();
        $this->loadView("../../Project-petcare-php/user/Views/product.php", ["data" => $data]);
    }
    public function detail()
    {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $record = $this->modelGetRecord($id);
        $this->loadView("../../Project-petcare-php/user/Views/product-detail.php", ["record" => $record]);
    }
}
