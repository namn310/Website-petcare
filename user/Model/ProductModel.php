<?php
trait ProductModel
{
    public function modelRead()
    {
        $conn = Connection::getInstance();
        $id_danhmuc = isset($_GET['idDM']) && is_numeric($_GET['idDM']) ? $_GET['idDM'] : 0;
        $query = $conn->query("select * from product where id_danhmuc=$id_danhmuc");
        $result = $query->fetchAll();
        return $result;
    }
    public function getDanhMuc($id_danhmuc)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select tendanhmuc from danhmuc where id_danhmuc = $id_danhmuc");
        $a = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($a as $result)
            return $result['tendanhmuc'];
    }
    public function modelGetRecord($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product where idPro=$id");
        return $query->fetch();
    }
}
