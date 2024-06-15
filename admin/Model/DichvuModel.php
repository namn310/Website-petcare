<?php
trait DichvuModel
{
    public function createDV()
    {
        $conn = Connection::getInstance();
        $nameDV = $_POST['nameDM'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = time() . '_' . $hinhanh;
        $dateAdd = date("d-m-y");
        //$addproduct = "insert into product set namePro=:_name,soluong=:_soluong,giaban=:_giaban,giavon=:_giavon,danhmuc=:_danhmuc,tinhtrang=:_tinhtrang,hinhanh=:_hinhanh,timeadd=:_timeadd ";
        //$query = $conn->prepare($addproduct);
        $query = $conn->prepare('INSERT INTO dichvu SET ten_dichvu=:nameDV,hinhanh=:hinhanh,dateCreate=:dateAdd');
        $query->execute([':nameDV' => $nameDV, ':hinhanh' => $hinhanh, 'dateAdd' => $dateAdd]);
        move_uploaded_file($hinhanh_tmp, "../assets/img-dichvu/" . $hinhanh);
    }
    public function getDV()
    {
        $conn = Connection::getInstance();
        $result = $conn->query('select * from dichvu');
        return $result->fetchAll();
    }
    public function getDetail($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from dichvu where id_dichvu=:id");
        $query->execute([':id' => $id]);
        return $query->fetchAll();
    }
    public function update($id)
    {
        $conn = Connection::getInstance();
        $name = $_POST['name'];
        //lấy biến connect
        $updateproduct = $conn->prepare("update dichvu set ten_dichvu=:_name where id_dichvu=:_id");
        $updateproduct->execute([":_name" => $name, ":_id" => $id]);

        //update product
        // $updateproduct = $conn->prepare("UPDATE product SET namePro=$product_name,soluong=$product_quantity,giaban=$product_giaban,giavon=$product_giavon,danhmuc=$product_category,tinhtrang=$product_state where idPro=$id");
        //$updateproduct->execute()

        if ($_FILES['hinhanh']['name'] != "") {
            //lấy hình ảnh của product
            $oldImg = $conn->query("select hinhanh from dichvu where id_dichvu=$id");
            if ($oldImg->rowCount() > 0)
                $oldImgSelect = $oldImg->fetch();
            if (file_exists("assets/img-dichvu/" . $oldImgSelect->hinhanh))
                unlink("assets/img-dichvu/" . $oldImgSelect->hinhanh);
            //xử lý hình ảnh
            $hinhanh = time() . '_' . $_FILES['hinhanh']['name'];
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
            move_uploaded_file($hinhanh_tmp, "../assets/img-dichvu/" . $hinhanh);
            $query = $conn->prepare("update dichvu set hinhanh=:_hinhanh where id_dichvu=:_id");
            $query->execute([":_hinhanh" => $hinhanh, ":_id" => $id]);
        }
    }
    public function deleteDV($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("delete from dichvu where id_dichvu=:_id");
        $query->execute([':_id' => $id]);
        
    }
}
