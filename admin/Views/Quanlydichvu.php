<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>

<div class="pagetitle">
  <h1>Quản lý dịch vụ</h1>
  <!-- End Page Title -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

          <div class="button-function d-flex justify-content-between mt-3 mb-4" style="width:70%">

            <button id="uploadfile" class="btn btn-success" type="button" title="Nhập"><a id="addnhanvien" href="index.php?controller=dichvu&action=create"><i class="fas fa-plus"></i>>
                Tạo mới dịch vụ</a></button>
            <!--
                                <button id="uploadfile" class="btn btn-secondary btn-sm nhap-tu-file" type="button"
                                    title="Nhập" onclick="myFunction(this)"><i class="fas fa-file-upload"></i>>
                                    Tải từ file</button>



                                <a class="btn btn-primary btn-sm print-file" type="button" title="In"
                                    onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>


                                <a class="btn btn-warning btn-sm print-file js-textareacopybtn" type="button"
                                    title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>



                                <a class="btn btn-success btn-sm" href="" title="In"><i class="fas fa-file-excel"></i>
                                    Xuất Excel</a>


                                <a class="btn btn-danger btn-sm pdf-file" type="button" title="In"
                                    onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
 -->
          </div>
          <div class="search mt-4 mb-4 input-group" style="width:50%">
            <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
            <input class="form-control" type="text" id="searchNV">
          </div>



          <table class="table table-hover table-bordered text-center" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
            <thead>

              <tr class="table-primary">

                <th>
                  ID danh mục
                </th>
                <th>
                  Tên dịch vụ
                </th>
                <th>
                  Thời gian tạo
                </th>
                <th>
                  Tính năng
                </th>
              </tr>
            </thead>
            <tbody id="table-nv">
              <?php
              foreach ($data as $row) {
              ?>
                <tr>
                  <td><?php echo $row->id_dichvu ?> </td>
                  <td><?php echo $row->ten_dichvu ?></td>
                  <td><?php echo $row->dateCreate ?></td>
                  <td>
                    <a href="index.php?controller=dichvu&action=delete&id=<?php echo $row->id_dichvu ?>"> <button class="btn btn-danger">X</button></a>
                    <a href="index.php?controller=dichvu&action=change&id=<?php echo $row->id_dichvu ?>"> <button class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                    <a href="index.php?controller=dichvu&action=detail&id=<?php echo $row->id_dichvu ?>"><button class="btn btn-primary">Xem</button></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


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