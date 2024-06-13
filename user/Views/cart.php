<?php
$this->layoutPath = "LayoutTrangChu.php";
$id = $_SESSION['customer_id'];
?>
<style>
  .img {
    width: 30%;
    height: 30%;
  }
</style>

<div class="container-fluid" style="margin-top:150px" style="background-color:#C0C0C0;height:max-height">
  <form action="index.php?controller=cart&action=update" method="post">
    <div class="table-responsive">
      <h3 class="text-center" style="color:#EA9E1E">GIỎ HÀNG</h3>
      <table class="table table-bordered align-middle text-center  p-3">
        <thead>
          <th class="image-fluid img">Ảnh sản phẩm</th>
          <th class="name">Tên sản phẩm</th>
          <th class="price">Giá</th>
          <th>Giảm giá</th>
          <th class="quantity">Số lượng</th>
          <th class="price">Thành tiền</th>
          <th></th>
        </thead>
        <tbody>
          <?php foreach ($_SESSION["cart"] as $product) { ?>
            <tr>
              <td>
                <img class="image-fluid img" src="../Project-petcare-php/assets/img-add-pro/<?php echo $product['photo'] ?>">
              </td>

              <td>
                <?php echo $product['name']; ?>
              </td>

              <td>
                <?php echo number_format($product['price']); ?>đ
              </td>
              <td>
                <?php echo ($product['discount']); ?>
              </td>

              <td class="">
                <input style="width:30%" type="number" id="quantity" min="1" value="<?php echo $product['number'];  ?>" name="product_<?php echo $product['id'] ?>" required="không để trống">
              </td>
              <?php
              if ($product['discount'] !== '') {
              ?>
                <td>
                  <p><b><?php echo number_format($product['number'] * ($product['price'] - ($product['price'] * $product['discount']) / 100)); ?>₫</b></p>
                </td>
              <?php
              } else {
              ?>
                <td>
                  <p><b><?php echo number_format($product['number'] * ($product['price'])); ?>₫</b></p>
                </td>
              <?php
              } ?>
              <td><a class="text-danger" href="index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
            </tr>
          <?php } ?>
        </tbody>
        <?php if ($this->cartNumber() > 0) : ?>

          <tr class="mt-2">
            <td colspan="4"><a href="index.php?controller=cart&action=destroy" class="btn btn-danger">Xóa toàn bộ</a></td>
            <td> <a href="index.php" style="text-decoration:none ;color:white" class="btn btn-primary">Tiếp tục mua hàng</a></td>
            <td><input type="submit" class="btn btn-success" value="Cập nhật">
            </td>
            <td></td>
          </tr>

        <?php endif; ?>
      </table>
    </div>
  </form>
  <?php if ($this->cartNumber() > 0) : ?>

    <div class="total-cart mb-3 text-end">
      <h4 class="text-end">Tổng tiền thanh toán:
        <?php echo number_format($this->cartTotal()); ?>₫</h4> <br>
      <button class="btn btn-primary checkout">
        <a style="text-decoration:none;color:white  " href="javascript:;">Thanh toán</a>
      </button>
      <!-- <a href="index.php?controller=cart&action=checkout"  ></a> -->
      <!-- <div style="text-align: center;" class="total-cart">Hình thức thanh toán online</div>

              <?php
              //$vnd_to_usd = round($this->cartTotal()/23000,2);
              ?>
              <div style="width: 300px;" id="paypal-payment-button"></div>
                <input type="hidden" id="vnd_to_usd"
                value="<?php //echo $vnd_to_usd; 
                        ?>">
            </div> -->
    <?php endif; ?>


    </div>

</div>
<br>
<div>
  <hr>
</div>
<?php
$conn = Connection::getInstance();
$query = $conn->query("select * from booking where idCus=$id order by id desc ");
$result = $query->fetchAll();

?>
<div class="booking mt-5 mb-4 text-center">
  <h3 style="color:#EA9E1E">ĐẶT LỊCH</h3>
  <i class="container">Nếu bạn muốn sửa thông tin lịch đã đặt thì bấm sửa để thay đổi lịch hẹn! Sau khi chúng tôi nhận được thông báo đặt lịch nhân viên sẽ liên hệ với bạn. Vui lòng thanh toán với nhân viên để bảo đảm việc đặt lịch !</i>
  <i>Nếu khách hàng có nhu cầu thay đổi lịch hẹn sau khi lịch hẹn đã được phê duyệt, xin vui lòng liên hệ với chúng tôi qua <b>hotline: 012345678</b> để được hỗ trợ</i>
  <div class="container-fluid">

    <table class="table table-bordered align-middle text-center  p-3">
      <thead>
        <th>Tên Boss</th>
        <th>Loại</th>
        <th>Tên dịch vụ</th>
        <th>Tên gói</th>
        <th>Cân nặng của Boss</th>
        <th>Lịch đặt</th>
        <th class="text-center d-flex flex-wrap"></th>
      </thead>

      <tbody class="booking-detail text-center">

        <?php
        foreach ($result as $row) {

        ?>
          <tr>

            <td>

              <input class="form-control" name="Bossname" value=" <?php echo $row->namePet ?>">

            </td>
            <td>
              <input class="form-control" name="Bosstype" value=" <?php echo $row->type ?>">
            </td>
            <td>
              <input class="form-control" name="dichvu" value=" <?php echo $row->nameService ?>">
            </td>
            <td>
              <input class="form-control" name="goi" value=" <?php echo $row->goi ?>">
            </td>
            <td>
              <input class="form-control" name="weight" value=" <?php echo $row->weight ?>">
            </td>
            <td>
              <input class="form-control" name="date" value=" <?php echo $row->dateBook ?>">
            </td>
            <td class="text-center d-flex flex-wrap justify-content-around">
              <?php
              if ($row->tinhtrangBook == 1) {
              ?>
            <th><button class="btn btn-success">Đã duyệt</button></th>
          <?php
              } else { ?>
            <a name="changeBook" href="index.php?controller=book&action=change&id=<?php echo $row->id ?>" class="changeBook" style="text-decoration:none"> <button type="submit" class="btn btn-primary">Sửa</button>
              <a class="mt-2" href="index.php?controller=book&action=delete&id=<?php echo $row->id ?>" style="text-decoration:none"> <button class="btn btn-danger ms-1" name="deleteBook">Xóa</button></a>
            <?php } ?>

            </td>

          </tr>

        <?php
        } ?>
      </tbody>
    </table>


  </div>

</div>
<script>
  $(document).ready(function() {
    $(".formChangeBook").hide();
    $(".changeBook").click(function() {
      $(".formChangeBook").toggle();
    })
  })
</script>
<div class=" formChangeBook">
  <div class="form-changeBook d-flex justify-content-center align-items-center">
    <div class=" align-items-center d-flex justify-content-left ps-5">
      <form style="border:1px solid black;border-radius:5px" method="post" class="align-items-center" action="index.php?controller=book&action=create&id=<?php echo $customerId ?>" name=" booking_form">
        <div class="form-group pe-5 ps-5">
          <h6 class="text-center">Thay đổi lịch hẹn</h6>
          <label for="Bossname">Tên của Boss</label>
          <input type="text" style="min-width:300px" class="form-control bossname" id="Bossname" name="Bossname" placeholder="Nhập tên của boss">

        </div>
        <div class="form-group pe-5 ps-5">
          <label for="Bosstype">Boss là: </label>
          <input type="text" style="min-width:300px" class="form-control" id="Bosstype" name="Bosstype" placeholder="Chó, mèo ">

        </div>
        <div class="form-group pe-5 ps-5">
          <label for="Bosstype">Tên dịch vụ: </label>
          <input type="text" style="min-width:300px" class="form-control" id="Bosstype" name="dichvu" placeholder="Tên gói muốn đăng ký ">

        </div>
        <div class="form-group pe-5 ps-5">
          <label for="Bosstype">Tên gói: </label>
          <input type="text" style="min-width:300px" class="form-control" id="Bosstype" name="goi" placeholder="Tên gói muốn đăng ký ">

        </div>
        <div class="form-group pe-5 ps-5">
          <label for="Bossweight">Cân nặng(kg): </label>
          <input type="text" style="min-width:300px" class="form-control" id="Bossweight" name="weight" placeholder="Điền cân nặng của Boss">
        </div>
        <div class="form-group pe-5 ps-5">
          <label>Chọn lịch</label>
          <input name="date" style="min-width:300px" class="form-control" placeholder="Nhập lịch" required type="text">
        </div>
        <div class="align-items-center d-flex justify-content-center">
          <button type="submit" class="btn btn-danger mt-3 submit_booking mb-2">
            Thay đổi
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid text-center">
  <img class="img-fluid" src="../Project-petcare-php/assets/img/618lwjSdN6L._AC_UF1000,1000_QL80_.jpg">
</div>
<style>
  .booking-detail input {
    border: none;

  }
</style>
<!--
<div id="pay-form" style="display:none">
  <div class="container mt-4 d-flex flex-column justify-content-center" id="pay-form">
    <div class="customer-detail bg-light" style="border:1px solid gray;border-radius:5px;padding:10px">
      <div class="mt-3"><strong>Thông tin khách hàng</strong></div>
      <form class="mt-4">
        <input onclick="checkCustomerDetailName()" onkeyup="checkCustomerDetailName()" id="name" type="text" class="form-control mb-3" placeholder="Họ và tên" required>
        <p style="color:red;display:none" id="errorName">Xin vui lòng kiểm tra lại</p>
        <input onclick="checkCustomerDetailPhone()" onkeyup="checkCustomerDetailPhone()" id="phonenumber" type="text" class="form-control" placeholder="Số điện thoại" required>
        <p style="color:red;display:none" id="errorPhone">Vui lòng nhập số điện thoại chính xác</p>
        <div>
          <select onmouseenter="checkCity()" onmouseout="checkCity()" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
            <option value="" selected>Chọn tỉnh thành</option>
          </select>

          <select onmouseenter="checkDistrict()" onmouseout="checkDistrict()" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
            <option value="" selected>Chọn quận huyện</option>
          </select>

          <select onmouseenter="checkWard()" onmouseout="checkWard()" class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
            <option value="" selected>Chọn phường xã</option>
          </select>
        </div>
        <input onclick="checkCustomerDetailLocate()" onkeyup="checkCustomerDetailLocate()" id="address" type="text" class="form-control mt-2" placeholder="Địa chỉ chi tiết" required>
        <input onclick="checkCustomerDetailEmail()" onkeyup="checkCustomerDetailEmail()" id="email" type="email" class="form-control" placeholder="Email" required>
        <p style="color:red;display:none" id="errorEmail">Vui lòng nhập đúng địa chỉ emai!</p>
        <p>Ghi chú (nếu có)</p>
        <textarea id="description" type="text" style="width:100%;resize:none;border-radius:5px">
                     </textarea>
        <button id="verifyCustomerDetail" type="button" onclick="verify()" class="btn btn-primary">Xác nhận</button>

        <div class="payment mt-5 bg-light" id="payment" style="display:none;border:1px solid gray;border-radius:5px;padding:10px">
          <div class="mb-2">
            <strong>
              Chọn phương thức thanh toán
            </strong>
          </div>
          <div class="payment-1">
            <input type="radio" checked value="payment1" name="payment" id="payment">
            <label style="font-weight: bolder;" for="payment-1">Thanh toán bằng phương thức COD</label>
            <div class="payment1-detail">
              <p>
                - Quý khách vui lòng thanh toán toàn bộ giá trị đơn hàng cho nhân viên giao hàng
              </p>
              <span>
                <strong>Lưu ý: </strong>
                <p>Trong trường hợp có bất cứ vấn đề gì về đơn hàng sau khi thanh toán quý khách vui lòng liên hệ qua bên tổng đài qua số Hotline: <strong>0912345669</strong></p>
              </span>
            </div>
          </div>

          <div class="payment-2">
            <input type="radio" value="payment2" name="payment" id="payment">
            <label style="font-weight: bolder;" for="payment-2">Thanh toán bằng phương thức chuyển khoản</label>
            <div class="payment2-detail">
              <p>

                Chủ tài khoản: NGUYEN PHUONG NAM

              </p>
              <p>Số tài khoản: 0123456789</p>
              <p>Nội dung chuyển khoản: <span class="text-danger"> [Họ tên khách hàng + số điện thoại] - Vui lòng nhập thông tin đúng với thông tin đã điền ở phía trên</span></p>
              <span>
                <strong>Lưu ý: </strong>
                <p>Trong trường hợp có bất cứ vấn đề gì về đơn hàng sau khi thanh toán quý khách vui lòng liên hệ qua bên tổng đài qua số Hotline: <strong>0912345669</strong></p>
              </span>
            </div>
          </div>
          <button type="button" style="width:15%" id="confirm-payment" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#modalconfirmpayment">
            Xác nhận thanh toán
          </button>
        </div>

        Button trigger modal -->

<!--
</div>
</div>
</form>

</div>

footer-->
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
<script src="../js/script.js"></script>

<script>
  $('.checkout').click(function() {
    if (confirm('Xử lý đơn hàng thành công')) {
      window.location.href = 'index.php?controller=cart&action=checkout';
    }
  })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
  $(document).ready(function() {
    $("#thanhtoan").click(function() {
      $("#pay-form").toggle();
    })
  })
</script>
<script>
  var citis = document.getElementById("city");
  var districts = document.getElementById("district");
  var wards = document.getElementById("ward");
  var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
  };
  var promise = axios(Parameter);
  promise.then(function(result) {
    renderCity(result.data);
  });

  function renderCity(data) {
    for (const x of data) {
      citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    citis.onchange = function() {
      district.length = 1;
      ward.length = 1;
      if (this.value != "") {
        const result = data.filter(n => n.Id === this.value);

        for (const k of result[0].Districts) {
          district.options[district.options.length] = new Option(k.Name, k.Id);
        }
      }
    };
    district.onchange = function() {
      ward.length = 1;
      const dataCity = data.filter((n) => n.Id === citis.value);
      if (this.value != "") {
        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

        for (const w of dataWards) {
          wards.options[wards.options.length] = new Option(w.Name, w.Id);
        }
      }
    };
  }
</script>