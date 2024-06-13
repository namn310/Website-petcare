<?php
trait loginModel
{
    public function modelLogin()
    {
        /*$email = $_POST["email"];
        $password = $_POST["password"];
        $password = md5($password);
        //echo $password;
        //lay bien ket noi csdl
        $conn = Connection::getInstance();
        //chuan bi cau truy van			
        $query = $conn->query("select email,pass from admin where email='$email'");
        if ($query->rowCount() > 0) {
            $record = $query->fetch();
            if ($record->pass == $password) {
                $_SESSION["email"] = $email;
                header("location:index.php");
            } else {
                echo '<script>alert("Bạn cần nhập đúng mật khẩu")</script>';
            }
        } else {
            header("location:index.php?controller=login");
        }
    }*/
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password1 = md5($password);
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from admin where pass=:password and email=:email ");
        $query->execute(["email" => $email, "password" => $password1]);
        if ($query->rowCount() > 0) {
            //---
            $record = $query->fetch();
            //---
            $_SESSION["admin_email"] = $record->email;
            $_SESSION["admin_id"] = $record->id;
        } else
            echo ('<script>alert("Email hoặc mật khẩu không chính xác !")</script>');
        header("location:index.php?controller=login");
    }
}
