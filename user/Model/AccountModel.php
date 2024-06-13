<?php
trait AccountModel
{
    /*public  function checkLoginModel()
    {
        $email = $_POST["emailUser"];
        $password = $_POST["password"];
        $password_hash = md5($password);
        $conn = Connection::getInstance();
        $query = ("select * from user where email_user=:var_email and pass_user=:var_password");
        $stmt = $conn->prepare($query);
        $stmt->execute(['var_email' => $email, 'var_password' => $password_hash]);
        $query1 = $stmt->fetchAll();
        if ($stmt > 0) {
            foreach ($query1 as $a) {
                $_SESSION["emailUser"] = $a['email_user'];
                $_SESSION["user_id"] = $a['id_user'];
                $_SESSION["name_user"] = $a['name_user'];
            }
            header("location:index.php?controller=home");
        } else
            header("location:index.php?controller=account&action=login");
    }*/
    //đăng nhập
    public function LoginModel()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password1 = md5($password);
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from customers where pass=:password and email=:email ");
        $query->execute(["email" => $email, "password" => $password1]);
        if ($query->rowCount() > 0) {
            //---
            $record = $query->fetch();
            //---
            $_SESSION["customer_email"] = $record->email;
            $_SESSION["customer_id"] = $record->id;
            $_SESSION["pass"] = $record->pass;
            header("location:index.php");
        } else
            echo ('<script>alert("Email hoặc mật khẩu không chính xác !")</script>');
        header("location:index.php?controller=account&action=login");
    }
}
