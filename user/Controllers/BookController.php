<?php
include "../Project-petcare-php/user/Model/BookModel.php";
class BookController extends Controller
{
    use BookModel;
    //load view trang đặt lịch
    public function index()
    {
        $this->loadView("../../Project-petcare-php/user/Views/booking.php");
    }
    //tạo lịch hẹn
    public function create()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->createBook($id);
        header("location:index.php?controller=cart");
    }
    //load đến trang thay đổi lịch 
    public function change()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $data = $this->getBook($id);
        $this->loadView("../../Project-petcare-php/user/Views/ChangeBooking.php", ["data" => $data]);
    }
    // thay đổi lịch hẹn
    public function changePost()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->changeBooking($id);
        echo ('<script>confirm("Thay đổi lịch thành công")</script>');
        header("location:index.php?controller=cart");
    }
    //xóa bỏ lịch hẹn
    public function delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->deleteBooking($id);
        echo ('<script>confirm("xóa lịch thành công")</script>');
        header("location:index.php?controller=cart");
    }
}
