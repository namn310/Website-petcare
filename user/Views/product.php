<?php
$this->layoutPath = ("LayoutTrangChu.php");
$id_danhmuc = isset($_GET['idDM']) && is_numeric($_GET['idDM']) ? $_GET['idDM'] : 0;
$conn = Connection::getInstance();
?>


<!-- main images -->
<div class="main_img mt-2">

</div>


<!-- Danh mục sản phẩm-->
<div class=" container-fluid pdt">
  <div class="row">
    <div class="col-3 sm">
      <h3 class="text-center mb-2">Danh mục sản phẩm</h3>
      <ul class="category list-group">
        <?php


        $data = $conn->query("SELECT * FROM danhmuc");
        $data->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($row = $data->fetchAll() as $a) {
        ?>
          <li class="list-group-item"><a href="index.php?controller=product&action=danhmuc&idDM=<?php echo $a['id_danhmuc'] ?>"> <button class="btn btn-white" style="width:100%"><?php echo $a['tendanhmuc'] ?></button></a></li>

        <?php } ?>
      </ul>
    </div>
    <div class="col-9 lg">
      <nav class="navbar mb-3 navbar-light bg-light justify-content-between">
        <h3 style="color:black"><?php echo $this->getDanhMuc($id_danhmuc)  ?></h3>
        <!-- <form class="form-inline d-flex"> 
          <input class="form-control mr-sm-2" type="text" id="nameProductSearch" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 ml-3" id="buttonSearch" type="button">Search</button>
        </form>-->
      </nav>

      <div class="product-list container d-flex justify-content-center align-items-center flex-wrap" number="">
        <?php
        $query = $conn->query("select * from product where id_danhmuc=$id_danhmuc");
        foreach ($data = $query->fetchAll() as $row) {
        ?>
          <div id="product-infor" class="card d-flex flex-column justify-content-around" style="width: 15rem;height:28rem">
            <div>
              <a id="img_pro" href="index.php?controller=product&action=detail&id=<?php echo $row->idPro ?>"> <img class="card-img-top img-fluid p-2" src="../Project-petcare-php/assets/img-add-pro/<?php echo $row->hinhanh ?>" alt="Card image cap"></a>
            </div>
            <div class="card-body" id="card-body">
              <h5 id="name-product" class="card-title"><?php echo $row->namePro ?></h5>
              <span class="rating secondary-font">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                5.0</span>
              <?php
              if ($row->discount == "") {
              ?>
                <p class="card-text text-danger"><?php echo number_format($row->giaban) ?></p>
              <?php
              } else {
              ?>
                <p class="card-text text-danger text-decoration-line-through"><?php echo number_format($row->giaban) ?></p>
                <p class="card-text text-danger"><?php echo  number_format($row->giaban - ($row->giaban * $row->discount) / 100); ?></p>

              <?php } ?>
            </div>
          </div>
        <?php
        } ?>



      </div>
      <!--
      <div class="mt-3 d-flex ">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
      -->
    </div>
  </div>
</div>

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
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Xác nhận</button>
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
<script src="js/script.js"></script>
<script>
  //searchProduct
  $(document).ready(function() {
    $("#nameProductSearch").on("keyup", function() {
      var q = document
        .getElementById("nameProductSearch")
        .value.toLowerCase();
      var product = document.querySelectorAll("#product-infor");
      var productName = document.querySelectorAll("#name-product");
      productName.forEach((a) => {
        $(a).parent().parent().filter(function() {
          $(a).parent().parent().toggle($(a).text().toLowerCase().indexOf(q) > -1)
        });
      });
    });
  });
</script>