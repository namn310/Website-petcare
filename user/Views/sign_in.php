<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo/PetCARE.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/user-responsive.css">
    <link rel="stylesheet" href="../css/user1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">




        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">




            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background:  #FFE4DA;">
                <div class="featured-image mb-3">
                    <img src="../Project-petcare-php/assets/img/PetCARE.png" class="img-fluid mt-3" style="width:100%">
                </div>

            </div>


            <!-------------------- ------ Right Box ---------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center text-center">
                    <div class="header-text mb-4">
                        <h3 style="font-family: 'Courier New', Courier, monospace;font-weight: 600;">Đăng Ký</h3>
                    </div>

                    <form id="loginForm" method="post" action="index.php?controller=register&action=registerPost">
                        <div class="form-group mb-3">
                            <input onclick="checkUserSignup()" onkeyup="checkUserSignup()" type="username" name="name" class="form-control form-control-lg bg-light fs-6" id="username" placeholder="Tên người dùng">
                            <p class="UsernameError text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input onclick="checkEmailSignup()" onkeyup="checkEmailSignup()" type="email" name="email" class="form-control form-control-lg bg-light fs-6" id="email_signup" placeholder="Địa chỉ Email">
                            <p class="emailError text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" onclick="checkCustomerDetailPhone()" onkeyup="checkCustomerDetailPhone()" name="phone" class="form-control form-control-lg bg-light fs-6" id="phone_signup" placeholder="Số điện thoại">
                            <p class=" text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="local" class="form-control form-control-lg bg-light fs-6" id="local_signup" placeholder="Địa chỉ">
                            <p class=" text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input onclick="checkPasswordSignup()" onkeyup="checkPasswordSignup()" type="password" name="pass" class="form-control form-control-lg bg-light fs-6" id="password_signup" placeholder="Mật Khẩu">
                            <p class="passwordError text-danger text-start ps-1"></p>
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-warning w-100 fs-6" type="submit" name="dangky" id="submit">Đăng Ký</button>
                        </div>
                    </form>


                    <div class="row">
                        <small>Bạn đã có tài khoản? <a href="login.html">Đăng Nhập</a></small>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <script>
        function checkCustomerDetailPhone() {
            var correct_phone =
                /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            var phone = document.getElementById("phone_signup");
            var phone_val = parseInt(phone.value);
            if (phone_val == "" || correct_phone.test(phone_val) == false) {
                phone.classList.add("is-invalid");
                return false;
            } else {
                phone.classList.remove("is-invalid");
                phone.classList.add("is-valid");
                return true;
            }
        }

        function isEmail(inputEmail) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(inputEmail);
        }

        function validatePassword(inputPassword) {
            return inputPassword.length > 4;
        }

        $(document).ready(function() {
            $('#email_signup').change(function() {
                var email = $(this).val().trim();
                // alert(`email = ${JSON.stringify(email)}`)
                if (!isEmail(email)) {
                    //Error ?
                    $(".emailError").html("Địa chỉ email không hợp lệ!");
                } else {
                    $(".emailError").html("");
                }
            });
            $('#password_signup').change(function() {
                var password = $(this).val();
                if (!validatePassword(password)) {
                    $(".passwordError").html("Mật khẩu phải có ít nhất 8 ký tự, có ít nhất 1 chữ thường và 1 chữ in");
                } else {
                    $(".passwordError").html("");
                }
            });
            $('#username').change(function() {
                var password = $(this).val();
                if (!validatePassword(password)) {
                    $(".UsernameError").html("Tên người dùng không hợp lệ ");
                } else {
                    $(".UsernameError").html("");
                }
            });
        });
    </script>
</body>

</html>