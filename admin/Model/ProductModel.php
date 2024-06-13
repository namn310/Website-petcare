<?php

trait ProductModel
{
    //đọc dữ liệu từ sql
    public function modelRead($recordPerPage)
    {
        $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        // lấy từ bản ghi nào
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM product ORDER BY idPro DESC limit $from,$recordPerPage");
        $result = $query->fetchAll();
        return $result;
    }
    //tinh tong so bản ghi
    public function modelTotal()
    {
        //lay bien ket noi;
        $conn = Connection::getInstance();
        $query = $conn->query("select idPro from product ");
        //rowCount() trả về số lượng row bị tác động;
        return $query->rowCount();
    }
    //lấy thông tin sản phẩm
    public function modelGetRecord($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * from product where idPro=$id limit 1");
        return $query->fetch();
    }
    //thêm sản phẩm
    public function modelCreate()
    {
        $conn = Connection::getInstance();

        $danhmuc = $conn->query("select * from danhmuc");
        $danhmuc->setFetchMode(PDO::FETCH_ASSOC);

        $product_name = $_POST['namepro'];
        $product_quantity = $_POST['countpro'];
        $product_giaban = $_POST['giabanpro'];
        $product_giavon = $_POST['giabanpro'];
        $product_category = $_POST['danhmucAddpro'];
        $discount = $_POST['discount'];
        $descrip = $_POST['mota'];
        foreach ($row = $danhmuc->fetchAll() as $a) {
            if ($a['tendanhmuc'] == $product_category) {
                $b = $a['id_danhmuc'];
            }
        }

        $product_state = $_POST['tinhtrangAddpro'];
        $iddanhmuc = $b;
        //xulyhinhanh
        $hinhanh = $_FILES['imagepro']['name'];
        $hinhanh_tmp = $_FILES['imagepro']['tmp_name'];
        $hinhanh = time() . '_' . $hinhanh;
        $dateAdd = date("d-m-y");
        //$addproduct = "insert into product set namePro=:_name,soluong=:_soluong,giaban=:_giaban,giavon=:_giavon,danhmuc=:_danhmuc,tinhtrang=:_tinhtrang,hinhanh=:_hinhanh,timeadd=:_timeadd ";
        //$query = $conn->prepare($addproduct);
        $conn->exec('INSERT INTO product(id_danhmuc,namePro, soluong, giaban, giavon,discount, danhmuc, tinhtrang, hinhanh,mota, timeadd) VALUES ("' . $iddanhmuc . '","' . $product_name . '","' . $product_quantity . '","' . $product_giaban . '","' . $product_giavon . '","' . $discount . '","' . $product_category . '","' . $product_state . '","' . $hinhanh . '","' . $descrip . '","' . $dateAdd . '")');

        move_uploaded_file($hinhanh_tmp, "../assets/img-add-pro/" . $hinhanh);
    }
    //Sửa sản phẩm
    public function modelChange($id)
    {
        $product_name = $_POST['namepro'];
        $product_quantity = $_POST['countpro'];
        $product_giaban = $_POST['giabanpro'];
        $product_giavon = $_POST['giabanpro'];
        $discount = $_POST['discount'];
        $product_category = $_POST['danhmucAddpro'];
        $product_state = $_POST['tinhtrangAddpro'];
        $descrip = $_POST['mota'];
        //$dateAdd = date("d-m-y");
        //lấy biến connect
        $conn = Connection::getInstance();
        $updateproduct = $conn->prepare("update product set namePro=:_name,soluong=:_soluong,giaban=:_giaban,giavon=:_giavon,discount=:_discount,danhmuc=:_danhmuc,tinhtrang=:_tinhtrang,mota=:_mota where idPro=:_id");
        $updateproduct->execute([":_name" => $product_name, ":_soluong" => $product_quantity, ":_giaban" => $product_giaban, ":_giavon" => $product_giavon, ":_discount" => $discount, ":_danhmuc" => $product_category, ":_tinhtrang" => $product_state, ":_mota" => $descrip, ":_id" => $id]);

        //update product
        // $updateproduct = $conn->prepare("UPDATE product SET namePro=$product_name,soluong=$product_quantity,giaban=$product_giaban,giavon=$product_giavon,danhmuc=$product_category,tinhtrang=$product_state where idPro=$id");
        //$updateproduct->execute()

        if ($_FILES['imagepro']['name'] != "") {
            //lấy hình ảnh của product
            $oldImg = $conn->query("select hinhanh from product where idPro=$id");
            if ($oldImg->rowCount() > 0)
                $oldImgSelect = $oldImg->fetch();
            if (file_exists("assets/img-add-pro/" . $oldImgSelect->hinhanh))
                unlink("assets/img-add-pro/" . $oldImgSelect->hinhanh);
            //xử lý hình ảnh
            $hinhanh = time() . '_' . $_FILES['imagepro']['name'];
            $hinhanh_tmp = $_FILES['imagepro']['tmp_name'];
            move_uploaded_file($hinhanh_tmp, "../assets/img-add-pro/" . $hinhanh);
            $query = $conn->prepare("update product set hinhanh=:_hinhanh where idPro=:_id");
            $query->execute([":_hinhanh" => $hinhanh, ":_id" => $id]);
        }
    }

    //xóa sản phẩm
    public function modelDelete($id)
    {
        $conn = Connection::getInstance();
        $oldPro = $conn->query("SELECT hinhanh FROM product where idPro=$id");
        $oldProImg = $oldPro->fetch();
        if (file_exists("../assets/img-add-pro/" . $oldProImg->hinhanh)) {
            unlink("../assets/img-add-pro/" . $oldProImg->hinhanh);
        }
        $conn->query("DELETE FROM product WHERE idPro=$id");
    }
}
