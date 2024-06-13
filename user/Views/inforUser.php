<?php
$this->layoutPath = "LayoutTrangChu.php";
$conn = Connection::getInstance();
$email = $_SESSION['customer_email'];
$query = $conn->prepare('SELECT * FROM customers WHERE email=:email');
$query->execute(["email" => $email]);
if (isset($_POST['updateInfor'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $local = $_POST['local'];
  $query1 = $conn->prepare("update customers set name=:_name, address=:_address,sodienthoai=:_phone ");
  $query1->execute([":_name" => $name, ":_address" => $local, ":_phone" => $phone]);
  if (isset($query1)) {
    echo ('<script>alert("Thay đổi thông tin thành công"</script>');
  }
}
foreach ($query->fetchAll() as $row) {
?>
  <!-- user infor -->
  <div class="row g-3 align-items-center mx-auto pdt">
    <div class="col-3">
      <div class="card border-0 ">
        <img src="../Project-petcare-php/assets/img/avatar-trang-99.jpg" class="card-img-top rounded-circle w-50 mx-auto" alt="">
        <div class="card-body text-center">
          <h5 class="card-title"></h5>
          <p class="card-text"><?php echo isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : "" ?></p>

        </div>
      </div>
    </div>
    <div class="col-6">
      <form method="post">
        <h1 class="text-center mt-3">Thông tin cá nhân</h1>
        <div class="row g-3 align-items-center border-start border-end border-secondary  border-secondary-subtle">
          <div class="col">
            <p class="ms-2">Họ tên</p>
            <input type="text" name="name" class="form-control" value="<?php echo $row->name ?>">
          </div>
          <div class="col-12">
            <p class="ms-2">Số điện thoại</p>
            <input type="text" class="form-control" name="phone" value="<?php echo $row->sodienthoai ?>">
          </div>
          <div class="col-12">
            <p class="ms-2">Địa chỉ</p>
            <input type="text" class="form-control" name="local" value="<?php echo $row->address ?>">
          </div>
          <div class="col-12">
            <div class="d-grid gap-2 col-4 mx-auto">
              <button class="btn btn-outline-danger" name="updateInfor" type="submit">Lưu thông tin</button>
            </div>

          </div>
        </div>
      </form>
    </div>
  <?php } ?>

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