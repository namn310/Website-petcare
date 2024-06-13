<?php
$this->layoutPath = "Layout.php";
?>
<script>
    /*function checkID() {
        var id = document.getElementById("idpro");
        var id_val = id.value;
        if (id_val == "") {
            id.classList.add("is-invalid");
            return false;
        } else {
            id.classList.remove("is-invalid");
            id.classList.add("is-valid");
            return true;
        }
    }*/

    function checkName() {
        var name_correct =
            /^[A-Za-z\sAÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+$/;
        var name = document.getElementById("namepro");
        var name_val = document.getElementById("namepro").value;
        if (name_val == "" || name_correct.test(name_val) == false) {
            name.classList.add("is-invalid");
            return false;
        } else {
            name.classList.remove("is-invalid");
            name.classList.add("is-valid");
            return true;
        }
    }

    function checkCount() {
        var a = $("#countpro");
        var b = a.val();
        if (b <= 0) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkCount() {
        var a = $("#countpro");
        var b = a.val();
        if (b <= 0 || !parseInt(b)) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkGiaBanPro() {
        var a = $("#giabanpro");
        var b = a.val();
        if (b <= 0 || !parseInt(b)) {
            a.addClass("is-invalid");
            return false
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkGiaVonPro() {
        var a = $("#giavonpro");
        var b = a.val();
        if (b <= 0 || !parseInt(b)) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkDanhMuc() {
        var a = $("#danhmucAddpro");
        var b = a.val();
        if (b === "Chọn danh mục") {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkTinhTrang() {
        var a = $("#tinhtrangAddpro");
        var b = a.val();
        if (b === "Chọn tình trạng") {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function checkImg() {
        var a = $("#imagepro");
        var b = a.val();
        if (b <= 0) {
            a.addClass("is-invalid");
            return false;
        } else {
            a.removeClass("is-invalid");
            a.addClass("is-valid");
            return true;
        }
    }

    function AddPro() {
        if (checkCount() == false || checkDanhMuc() == false || checkGiaBanPro() == false || checkGiaVonPro() == false || checkName() == false || checkTinhTrang() == false) {
            alert("Vui lòng kiểm tra lại thông tin sản phẩm");
        } else {

            location.reload();
        }
    }
</script>

<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=product">Quản lý sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
        </ol>
    </nav>
    <div style="background-color: white;padding:20px;border-radius:20px;box-shadow: 2px 2px 2px #FFCC99;">
        <!-- End Page Title -->
        <form method="post" id="AddProForm" action="index.php?controller=product&action=changePost&idPro=<?php echo $record->idPro ?>" enctype="multipart/form-data" class="row mt-4">

            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Tên sản phẩm</label>
                <input class="form-control" value="<?php echo $record->namePro ?>" id="namepro" name="namepro" onclick="checkName()" onchange="checkName()" type="text" required>
            </div>
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Số lượng</label>
                <input class="form-control" value="<?php echo $record->soluong ?>" onclick="checkCount()" onchange="checkCount()" name="countpro" id="countpro" type="text" required>
            </div>
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giá bán(VND)</label>
                <input class="form-control" id="giabanpro" value="<?php echo $record->giaban ?>" name="giabanpro" onclick="checkGiaBanPro()" onchange="checkGiaBanPro()" type="text" required>
            </div>
            <div class="form-group  col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giá vốn(VND)</label>
                <input class="form-control" id="giavonpro" value="<?php echo $record->giavon ?>" name="giavonpro" onclick="checkGiaVonPro()" onchange="checkGiaVonPro()" type="text" required>
            </div>
            <div class="form-group  col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giảm giá(%)</label>
                <input class="form-control" id="giavonpro" name="discount" onclick="checkGiaVonPro()" onchange="checkGiaVonPro()" type="text">
            </div>
            <div class="form-group col-md-3">
                <label style="font-weight: bolder;" class="control-label mt-3">Danh mục</label>
                <select class="form-control" onclick="checkDanhMuc()" onchange="checkDanhMuc()" id="danhmucAddpro" name="danhmucAddpro" required>
                    <option><?php echo $record->danhmuc ?></option>
                    <option>Pate</option>
                    <option>Thức ăn hạt</option>
                    <option>Thực phẩm chức năng</option>
                    <option>Đồ chơi</option>
                    <option>Dụng cụ</option>
                    <option>Phụ kiện</option>
                </select>
            </div>

            <div class="form-group  col-md-3">
                <label style="font-weight: bolder;" for="exampleSelect1" class="control-label mt-3">Tình
                    trạng</label>
                <select class="form-control" onclick="checkTinhTrang()" onchange="checkTinhTrang()" id="tinhtrangAddpro" name="tinhtrangAddpro">
                    <option><?php echo $record->tinhtrang ?></option>
                    <option>Còn hàng</option>
                    <option>Hết hàng</option>
                </select>
            </div>
            <div class="form-group ">
                <label style="font-weight: bolder;" class="control-label mt-3">Mô tả sản phẩm</label>

                <textarea id="mota" name="mota" class="form-control"><?php echo isset($record->mota) ? $record->mota : "" ?> </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace("mota");
                </script>
            </div>

            <div class="form-group col-md-12">
                <label style="font-weight: bolder;" class="control-label mt-3">Ảnh sản phẩm</label>
                <input class="form-control" id="imagepro" name="imagepro" style="width:30%" type="file">
                <img style="width:200px;height:200px;margin-top:20px" src="../assets/img-add-pro/<?php echo $record->hinhanh ?>">
            </div>


            <button class="btn btn-success mt-4 ms-2" type="submit" id="buttonAddPro" style="width:10%" name="addproduct">Sửa
            </button>

        </form>

    </div>
</div>






<!-- ======= Footer ======= -->



<script src="../js/ckeditor/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"> </script>
<style>
    .ck-editor__editable_inline {
        min-height: 250px;
        max-height: 450px;
    }
</style>
<script>
    ClassicEditor.create(document.querySelector('#mota'), {
            language: 'vi'
        })
        .then(editor => {})
        .catch(error => {
            console.error(error)
        });
</script>