<?php
include "Model/DonhangModel.php";
class DonhangController extends Controller
{
    use DonhangModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
        $recordPerPage = 20;
        $numPage = ceil($this->modelTotal() / $recordPerPage);
        $listRecord = $this->modelRead($recordPerPage);

        $this->loadView("Quanlydonhang.php", ["listRecord" => $listRecord, "numPage" => $numPage]);
        }
    }
    //chi tiet don hang
    public function detail()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        //goi ham tu model de thuc hien
        $data = $this->modelListOrderDetails($id);
        //load view
        $this->loadView("ChiTietDonHang.php", ["data" => $data, "id" => $id]);
    }
    public function delete()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->deleteOrder($id);
        header("Location:index.php?controller=donhang");
    }
    public function delivery()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->deliveryModel($id);
        //$conn = Connection::getInstance();
        // $query = $conn->prepare("update orders set status = 1 where id = :_id");
        // $query->execute([":_id" => $id]);
        header("Location:index.php?controller=donhang");
    }
}
