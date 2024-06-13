<?php
trait BookModel
{
    //ham liet ke danh sach cac ban ghi, co phan trang
    public function modelRead($recordPerPage)
    {
        //lay tong to so ban ghi
        $total = $this->modelTotal();
        //tinh so trang
        $numPage = ceil($total / $recordPerPage);
        //lay so trang hien tai truyen tu url
        $page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"] - 1 : 0;
        //lay tu ban ghi nao
        $from = $page * $recordPerPage;
        //thuc hien truy van
        $conn = Connection::getInstance();
        $query = $conn->query("select * from booking order by id desc limit $from, $recordPerPage");
        //tra ve tat ca cac ban truy van duoc
        return $query->fetchAll();
    }
    //ham tinh tong so ban ghi
    public function modelTotal()
    {
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select id from booking");
        //lay tong so ban ghi
        return $query->rowCount();
        //---
    }
    public function getDetailBook($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from booking,customers where idCus=customers.id");
        return $query;
    }
    public function confirmBook($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("update booking set tinhtrangBook=:tinhtrang");
        $query->execute(["tinhtrang" => 1]);
    }
    public function unconfirmBook($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("update booking set tinhtrangBook=:tinhtrang");
        $query->execute(["tinhtrang" => '']);
    }
    //xóa lịch hẹn
    public function deleteBooking($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("delete from booking where id=:id");
        $query->execute(['id' => $id]);
    }
}
