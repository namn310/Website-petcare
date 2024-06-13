<?php
include "Model/DanhmucModel.php";
class DanhmucController extends Controller
{
    use DanhmucModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {

            $data = $this->modelRead();
            //goi view, truyen du lieu ra view
            $this->loadView("quanlydanhmuc.php", ["data" => $data]);
        }
    }
    public function create()
    {

        $this->loadView("Adddanhmuc.php");
    }
    public function createPost()
    {
        $this->modelCreate();
        header("Location:index.php?controller=danhmuc");
    }
    public function delete()
    {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $this->modelDelete($id);
        //quay tro lai mvc categories
        header("location:index.php?controller=danhmuc");
    }
}
