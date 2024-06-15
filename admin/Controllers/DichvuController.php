<?php
include "Model/DichvuModel.php";
class DichvuController extends Controller
{
    use DichvuModel;
    public function index()
    {
        $data = $this->getDV();
        $this->loadView("Quanlydichvu.php", ['data' => $data]);
    }
    public function create()
    {
        $this->loadView("Adddichvu.php");
    }
    public function createPost()
    {
        $this->createDV();
        header("Location:index.php?controller=dichvu");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $data = $this->getDetail($id);
        $this->loadView('DichvuDetail.php', ['data' => $data]);
    }
    public function change()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $data = $this->getDetail($id);
        $this->loadView('ChangeDichvu.php', ['data' => $data]);
    }
    public function changePost()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->update($id);
        echo ('<script>alert("Thay đổi thành công")</script>');
        header("Location:index.php?controller=dichvu");
    }
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->deleteDV($id);
        echo ('<script>alert("Xóa thành công thành công")</script>');
        header("Location:index.php?controller=dichvu");
    }
}
