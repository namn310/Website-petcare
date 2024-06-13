<?php
$this->layoutPath = "LayoutTrangChu.php";

?>
<div class="container-fluid" style="margin-top:100px">
    <img class="w-100" src="../Project-petcare-php/images/product/banner_collection.webp">
</div>
<!--Hot product-->
<div class="d-flex flex-column justify-content-center align-items-center mb-3">
    <span class="service text-center">
        <h3 style="font-family:Geneva">Hot Product</h3>
    </span>
    <i class="fa-solid fa-heart" style="color: #de2121;align-items: center;"></i>
</div>
<div class="product-list container d-flex align-items-center justify-content-evenly flex-wrap" number="">
    <?php
    $result = $this->ModelHotProduct();
    foreach ($result as $a) {
    ?>
        <!-- san pham 1 -->
        <div class="col-lg-3 col-md-4 mb-3 ps-3">
            <div class="product-box">
                <div class="product-inner-box position-relative">
                    <!-- 
                    <div class="icons position-absolute">
                        <a href="" class="text-decoration-none text-dark"><i class="fas fa-heart text-danger"></i></a>
                        <a href="" class="text-decoration-none text-dark"><i class="fas fa-eye"></i></a>
                    </div>
    -->
                    <div class="onsale position-absolute top-0 start-0">
                        <span class="badge rounded-0"><i class="fa-solid fa-arrow-down"></i><?php echo $a->discount ?>%</span>
                    </div>
                    <div> <a href="index.php?controller=product&action=detail&id=<?php echo $a->idPro ?>"> <img src="../Project-petcare-php/assets/img-add-pro/<?php echo $a->hinhanh ?>" alt="img-fluid"></a></div>
                    <!-- 
                    <div class="cart-btn">
                        <button class=" btn btn-white shadow-sm rounded-pill" id="buy" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#modalbuyproduct"><i class="fa-solid fa-cart-shopping"></i>
                            Mua</button>
                    </div>-->
                </div>
                <div class="product-info">
                    <div class="product-name mt-2">
                        <h3 class="mt-4"></h3>
                    </div>
                    <span class="rating secondary-font">
                        <b><?php echo $a->namePro ?></b>
                        <br>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        5.0
                    </span>
                    <div class="product-price">
                        <p class="card-text text-danger text-decoration-line-through"><?php echo number_format($a->giaban) ?></p>
                        <p class="text-danger"><?php echo
                                                number_format($a->giaban - ($a->giaban * $a->discount) / 100);  ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

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
<div class="container mt-3">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="../Project-petcare-php/images/product/banner.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Đa dạng cái loại đồ ăn</h5>
                    <p>Chúng tôi luôn đem đến da dạng các loại đồ ăn cho thú cưng</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../Project-petcare-php/images/product/slider_3.webp" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Dịch vụ tận tâm</h5>
                    <p>Chúng tôi luôn quan tâm đến trải nghiệm người dùng </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../Project-petcare-php/images/product/Banner3-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Uy tín, chất lượng</h5>
                    <p>Chúng tôi luôn đặt uy tín, chất lượng lên hàng đầu</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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
<!--footer end-->