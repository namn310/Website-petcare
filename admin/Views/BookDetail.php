<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>

<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=book">Danh sách lịch hẹn</a></li>
            <li class="breadcrumb-item active" aria-current="page">Xem chi tiết</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="container-fluid border border-primary rounded">
    <div class="p-4">
        <?php
        foreach ($data as $row) {

        ?>

            <div class="name d-inline-block">
                <span>
                    <b class="me-3">Tên khách hàng: </b><?php echo $row->name ?>
                </span>
            </div>
            <div class="local mt-4 ">
                <span>
                    <b class="me-3">Địa chỉ:</b><?php echo $row->address ?>
                </span>
            </div>
            <div class="phone mt-4">
                <span>
                    <b class="me-3">Số điện thoại:</b><?php echo $row->sodienthoai ?>
                </span>
            </div>
            <div class="namePet mt-4">
                <span>
                    <b class="me-3">Tên Pet:</b><?php echo $row->namePet ?>
                </span>
            </div>
            <div class="nameService mt-4">
                <span>
                    <b class="me-3">Tên dịch vụ:</b><?php echo $row->nameService ?>
                </span>
            </div>
            <div class="goi mt-4">
                <span>
                    <b class="me-3">Gói:</b><?php echo $row->goi ?>
                </span>
            </div>
            <div class="dateBook mt-4">
                <span>
                    <b class="me-3">Ngày hẹn:</b><?php echo $row->dateBook ?>
                </span>
            </div>
            <div class="dateCre mt-4">
                <span>
                    <b class="me-3">Ngày tạo:</b><?php echo $row->dateCreate ?>
                </span>
            </div>

            <div class="local mt-4">

                <?php
                if ($row->tinhtrangBook == 1) {
                ?>
                    <button class="btn btn-success">Đã duyệt</button>
                <?php
                } else { ?>
                    <button class="btn btn-danger">Chưa duyệt</button>
                <?php } ?>


            </div>
        <?php
        } ?>

    </div>
</div>
<!--
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                     Table with stripped rows
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    <b>I</b>D đơn hàng
                                </th>
                                <th>Khách Hàng </th>
                                <th>Đơn hàng</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Tình trạng</th>
                                <th>Tính năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HD1</td>
                                <td>Bùi An Khang</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-primary">Chờ Thanh Toán</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD2</td>
                                <td>Hoàng Kim Tấn</td>
                                <td>Dụng cụ cắt móng chó</td>
                                <td>1</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-primary">Chờ Thanh Toán</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD3</td>
                                <td>Nguyễn Phương Nam</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD4</td>
                                <td>Bùi An Tấn</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD5</td>
                                <td>Hoàng Kim Nam</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD6</td>
                                <td>Nguyễn Phương Tấn</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD7</td>
                                <td>Trần Văn Tấn</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD8</td>
                                <td>Nguyễn Thị Tấn</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>5</td>
                                <td>500.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD9</td>
                                <td>Bùi An Khang</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD10</td>
                                <td>Bùi An Khang</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD11</td>
                                <td>Bùi An Khang</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-success">Hoàn thành</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td>HD12</td>
                                <td>Bùi An Khang</td>
                                <td>Dụng cụ cắt móng mèo</td>
                                <td>2</td>
                                <td>400.000đ</td>
                                <td>
                                    <button class="disabled btn btn-primary">Chờ Thanh Toán</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                     End Table with stripped rows

                </div>
            </div>

        </div>
    </div>
</section>
-->


<!-- ======= Footer ======= -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/../Project-petcare-php/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/../Project-petcare-php/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/../Project-petcare-php/assets/vendor/chart.js/chart.umd.js"></script>
<script src="/../Project-petcare-php/assets/vendor/echarts/echarts.min.js"></script>
<script src="/../Project-petcare-php/assets/vendor/quill/quill.js"></script>
<script src="/../Project-petcare-php/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/../Project-petcare-php/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/../Project-petcare-php/assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="/../Project-petcare-php/admin/js/main.js"></script>