<?php
include("Model/NhanvienModel.php");
class NhanvienController extends Controller
{

    use NhanvienModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("Quanlynhanvien.php");
        }
    }
    public function create()
    {
        $this->loadView("Addnhanvien.php");
    }
    public function createPost()
    {
        $this->modelCreate();
        header("Location:index.php?controller=nhanvien");
    }
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->delete($id);
        header("Location:index.php?controller=nhanvien");
    }
}
