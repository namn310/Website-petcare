<?php
trait UserModel
{
    //đổi thông tin user
    public function update($id)
    {
        /*$old_pass = $_POST['currentPass'];
        $new_pass = $_POST['newPass'];
        $confirm_newpass = $_POST['confirmPass'];
        $conn = Connection::getInstance();
        $record = $conn->query("select pass from customers where id = $id");
        $checkOldPass = md5($old_pass);
        die();*/
        $conn = Connection::getInstance();
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $local = $_POST['local'];
        $query = $conn->prepare("update customers set name=:_name, address=:_address,sodienthoai=:_phone ");
        $query->execute([":_name" => $name, ":_address" => $local, ":_phone" => $phone]);
        
    }
}
