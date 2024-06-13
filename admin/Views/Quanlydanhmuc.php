<?php
//load file layout.php
$this->layoutPath = "Layout.php";


?>

<div class="pagetitle">
    <h1>Quản lý danh mục</h1>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <div class="button-function d-flex justify-content-between mt-3 mb-4" style="width:70%">

                        <button id="uploadfile" class="btn btn-success" type="button" title="Nhập"><a id="addnhanvien" href="index.php?controller=danhmuc&action=create"><i class="fas fa-plus"></i>>
                                Tạo mới danh mục</a></button>
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
                                <th width="10">

                                </th>
                                <th>
                                    ID danh mục
                                </th>
                                <th>
                                    Tên danh mục
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
                                    <td width="10">
                                        <input type="checkbox" name="check1" value="1" />
                                    </td>
                                    <td><?php echo $row->id_danhmuc ?></td>
                                    <td>
                                        <?php echo $row->tendanhmuc ?>
                                    </td>

                                    <td class="table-td-center">
                                        <button class="btn btn-danger btn-sm trash" type="button" title="Xóa">
                                            <a style="color:white" href="index.php?controller=danhmuc&action=delete&id=<?php echo $row->id_danhmuc ?>"> <i class="fas fa-trash-alt"></i></a>
                                        </button>
                                        <button class="btn btn-success btn-sm edit" type="button" title="Sửa" id="show-emp" data-bs-toggle="modal" data-bs-target="#ModalUP">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php

                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
  MODAL
-->
<div class="modal fade" id="ModalUP" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>
                    Chỉnh sửa thông tin
                    nhân viên
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label">ID nhân viên</label>
                        <input class="form-control" type="text" required value="#CD2187" disabled />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" type="text" required value="Hồ Thị Thanh Ngân" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Số điện thoại</label>
                        <input class="form-control" type="number" required value="09267312388" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Địa chỉ email</label>
                        <input class="form-control" type="text" required value="namnnrr@gmail.com" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Ngày sinh</label>
                        <input class="form-control" type="date" value="15/03/2000" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleSelect1" class="control-label">Chức vụ</label>
                        <select class="form-control" id="exampleSelect1">
                            <option>Bán hàng</option>
                            <option>Tư vấn</option>
                            <option>Dịch vụ</option>
                            <option>Bác sĩ thú y</option>
                            <option>Spa-Grooming</option>
                        </select>
                    </div>
                </div>
                <br />


            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-bs-dismiss="modal" type="button">
                    Lưu lại
                </button>
                <button class="btn btn-danger" data-bs-dismiss="modal" href="#">Hủy bỏ</button>
            </div>

        </div>
    </div>
</div>
<!--
  MODAL
-->

<!-- Modal xóa -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Xóa thành công
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<!-- ======= Footer ======= -->




<script>
    $(document).ready(function() {
        $("#searchNV").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table-nv tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>