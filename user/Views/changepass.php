<?php
$this->layoutPath = "LayoutTrangChu.php";

if (isset($_POST['submit'])) {
    $id = $_SESSION['customer_id'];
    $conn = Connection::getInstance();
    $query = $conn->query("select * from customers where id=$id");
    foreach ($query->fetchAll() as $a) echo $oldpass = $a->pass;
    $old_pass = $_POST['currentPass'];
    $new_pass = $_POST['newPass'];
    $confirm_newpass = $_POST['confirmPass'];
    $checkOldPass = md5($old_pass);

    if ($checkOldPass == $oldpass && $new_pass != ' ' && $confirm_newpass != ' ' && $new_pass == $confirm_newpass) {
        $newPass = md5($new_pass);
        $query = $conn->prepare("update customers set pass=:_newpass");
        $query->execute([":_newpass" => $newPass]);
        if (isset($query)) {
            echo ('<script>alert("Đổi mật khẩu thành công")</script>');
        }
    }
    if ($old_pass == ' ' || $new_pass == ' ' || $confirm_newpass == ' ') {
        echo ('<script>alert("Vui lòng điền đầy đủ thông tin")</script>');
    } else {
        if ($checkOldPass != $oldpass) {
            $loi_current_pass = "Mật khẩu không đúng";
        } else {
            if ($new_pass != $confirm_newpass) {
                echo ('<script>alert("Mật khẩu không trùng khớp")</script>');
            }
        }
    }
}


?>

<!-- user infor -->
<div class="row g-3 align-items-center mx-auto pdt">
    <div class="col-3">
        <div class="card border-0 ">
            <img src="../assets/img/avatar-trang-99.jpg" class="card-img-top rounded-circle w-50 mx-auto" alt="">
            <div class="card-body text-center">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : "" ?></p>

            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="container">
            <form name="frmChange" method="post">

                <h2 class="text-center" style="color:#EA9E1E">Đổi mật khẩu</h2>
                <div>
                    <div class="row">
                        <?php
                        $loi_current_pass = isset($loi_current_pass) ? $loi_current_pass : "";
                        $loi_confirm_pass = isset($loi_confirm_pass) ? $loi_confirm_pass : "";
                        ?>
                        <label class="form-label">Mật khẩu hiện tại</label>
                        <span id="currentPassword" class="validation-message"></span> <input type="password" placeholder="Nhập mật khẩu" name="currentPass" class="form-control">
                        <p id="pass_error" class="text-danger"><?php echo $loi_current_pass ?></p>

                    </div>
                    <div class="row">
                        <label class="form-label">Mật khẩu mới</label> <span id="newPassword" class="validation-message"></span><input class="form-control" type="password" name="newPass" placeholder="Mật khẩu dài hơn 6 ký tự" class="full-width">

                    </div>
                    <div class="row">
                        <label class="form-label">Xác nhận mật khẩu</label>
                        <span id="confirmPassword" class="validation-message"></span><input class="form-control" type="password" name="confirmPass" class="full-width" placeholder="Nhập lại mật khẩu">
                        <p id="confirm_pass_error" class="text-danger"><?php echo $loi_confirm_pass  ?></p>

                    </div>
                    <div class="row mt-3">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary" class="full-width">Xác nhận</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>
<!--footer-->
<div class="container-fluid d-flex justify-content-around flex-wrap bg-dark mt-5">
    <div class="footer1 d-flex align-items-center flex-column p-3">
        <h1 class="mb-3 mt-4  text-capitalize" style="color:#F7A98F">PetCare</h1>
        <p class="text-white">Giờ hoạt động: 8AM-10PM</p>
    </div>
    <div class="footer2 mt-3 text-white d-flex flex-column justify-content-between p-3">
        <h3>Get in touch</h3>
        <span>
            <h6><i class="fa-solid fa-envelope-circle-check fa-lg me-3" style="color: #ffffff;"></i>petcare@gmail.com</h6>
        </span>
        <span>
            <h6><i class="fa-solid fa-phone fa-lg me-4" style="color: #ffffff;"></i>0912345678</h6>
        </span>
        <span>
            <h6><i class="fa-solid fa-location-dot fa-lg me-4" style="color: #ffffff;"></i>Láng Thượng, Đống Đa, Hà Nội</h6>
        </span>
    </div>
    <div class="footer3 d-flex text-white flex-column mt-3 justify-content-between p-3 text-center">
        <h3>Popular links</h3>
        <a href="#"><i class="fa-brands fa-facebook fa-lg me-3" style="color: #ffffff;"></i></a>
        <a href="#"><i class="fa-brands fa-instagram fa-lg me-3" style="color: #ffffff;"></i></a>
        <a href="#"><i class="fa-brands fa-youtube fa-lg me-3" style="color: #ffffff;"></i></a>
    </div>

</div>

<!--footer end-->
<script>
    $(document).ready(function() {

        $("#confirm_pass_error").hide();
    })
</script>
<!--footer end-->