<?php
$this->layoutPath = ("LayoutTrangChu.php");
$id_danhmuc = isset($_GET['idDM']) && is_numeric($_GET['idDM']) ? $_GET['idDM'] : 0;
$conn = Connection::getInstance();
?>





<style>
  @media screen and (max-width:1030px) {
    .a {
      margin-top: 50px;
    }
  }

  @media screen and (max-width:750px) {
    .a {
      margin-top: 100px;
    }
  }
</style>
<!-- Danh mục sản phẩm-->
<div class="container-fluid pdt">
  <div class="row a ">
    <div class="col-3 sm">
      <h3 class="text-center mb-2">Danh mục sản phẩm</h3>
      <ul class="category list-group">
        <?php


        $data = $conn->query("SELECT * FROM danhmuc");
        $data->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($row = $data->fetchAll() as $a) {
        ?>
          <li class="list-group-item"><button class="btn btn-white" style="width:100%"><a href="index.php?controller=product&action=danhmuc&idDM=<?php echo $a['id_danhmuc'] ?>"><?php echo $a['tendanhmuc'] ?></a></button></li>

        <?php } ?>
      </ul>
    </div>
    <div class="col-9 lg">
      <nav class="navbar mb-3 navbar-light bg-light justify-content-between">
        <h3 style="color:black"></h3>
        <form class="form-inline d-flex">
          <input class="form-control mr-sm-2" type="text" id="nameProductSearch" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 ml-3" id="buttonSearch" type="button">Search</button>
        </form>
      </nav>
      <div class="product-detail d-flex ">
        <div class="product-detail-img">
          <img class="img-float" style="max-width:400px;max-height:400px;border:1px solid  #EA9E1E;border-radius:5px" src="../Project-petcare-php/assets/img-add-pro/<?php echo $record->hinhanh ?>">
        </div>
        <div class="product-detail-intro">
          <p>
          <h4><?php echo $record->namePro ?></h4>
          </p>
          <p><strong>Mã sản phẩm :</strong><?php echo $record->idPro ?></p>
          <p><strong>Lượt mua: </strong>324</p>


          <?php
          if ($record->discount == "") {
          ?>
            <p class="card-text text-danger">Giá: <?php echo number_format($record->giaban) ?></p>
          <?php
          } else {
          ?>
            <span>Giá gốc
              <i class="card-text text-danger text-decoration-line-through"> <?php echo number_format($record->giaban) ?></i>
            </span>
            <p class="card-text text-danger"><?php echo  number_format($record->giaban - ($record->giaban * $record->discount) / 100); ?></p>

          <?php } ?>


          <!-- Button trigger modal -->
          <button type="button" style="width:30% ;margin-left:10px;margin-bottom:20px" id="cartSucess" class="btn btn-danger mt-3">
            <a style="text-decoration:none;color:white" href="index.php?controller=cart&action=create&id=<?php echo $record->idPro ?>">
              Thêm vào giỏ hàng
            </a>

          </button>

        </div>
      </div>
      <div class="mt-3">
        <ul class="nav nav-tabs" style="cursor:pointer">
          <li class="nav-item" style="font-weight:bold">
            <a class="nav-link" id="mota" style="text-decoration:none;color:black" aria-current="page">Mô tả sản phẩm</a>
          </li>
          <li class="nav-item" style="font-weight:bold">
            <a class="nav-link" id="comment" style="text-decoration:none;color:black">Bình luận</a>
          </li>
        </ul>
        <!-- Mô tả sản phẩm -->
        <div class="thongtinchitiet mt-3" style="padding-bottom:50px">
          <?php echo $record->mota ?>
        </div>
        <!-- Bình luận sản phẩm -->
        <div class="comment mt-3">
          <form>
            <textarea placeholder="Nhập bình luận của bạn" style="width:100%;resize:none;border-radius:10px"></textarea>
          </form>
        </div>
      </div>
      <script>
        $("#comment").click(function() {
          $(".thongtinchitiet").hide();
          $(".comment").show();
        })
        $("#mota").click(function() {
          $(".thongtinchitiet").show();
          $(".comment").hide();
        })
      </script>


      <!-- modal thông báo thêm hàng vào giỏ  -->
      <div class="modal fade" id="modalbuyproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Đã thêm sản phẩm vào giỏ hàng !
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Xác nhận</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End mục sản phẩm-->


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
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="cartSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

<!--footer end-->
<script src="js/script.js"></script>
<script>
  const toastTrigger = document.getElementById('liveToastBtn');
  const toastLiveExample = document.getElementById('liveToast');

  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
      toastBootstrap.show()
    })
  }
</script>