<?php
include "Model/BookModel.php";
class BookController extends Controller
{
    use BookModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $recordPerPage = 20;
            $numPage = ceil($this->modelTotal() / $recordPerPage);
            $listRecord = $this->modelRead($recordPerPage);

            $this->loadView("Quanlybook.php", ["listRecord" => $listRecord, "numPage" => $numPage]);
        }
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $data = $this->getDetailBook($id);
        $this->loadView("BookDetail.php", ["data" => $data]);
    }
    public function confirm(){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->confirmBook($id);
        header("location:index.php?controller=book");
    }
    public function unconfirm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->unconfirmBook($id);
        header("location:index.php?controller=book");
    }
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->deleteBooking($id);
        echo ('<script>confirm("xóa lịch thành công")</script>');
        header("location:index.php?controller=book");
    }
}
