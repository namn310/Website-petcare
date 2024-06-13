<?php
if (isset($_GET['controller']) || isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = '';
    $action = '';
}
if ($controller == '') {
    include "Views/index.php";
} else if ($controller == 'quanlykhachhang') {
    include "Views/Quanlykhachhang.php";
} else if ($controller == 'quanlynhanvien') {
    include "Views/Quanlynhanvien.php";
} else if ($controller == 'quanlysanpham') {
    include "Views/Quanlysanpham.php";
} else if ($action == 'create' && $controller == 'quanlysanpham') {
    include_once "Views/Addsanpham.php";
} else if ($controller == 'quanlydichvu') {
    include "Views/Quanlydichvu.php";
} else if ($controller == 'quanlydonhang') {
    include "Views/Quanlydonhang.php";
} else if ($controller == 'bangluong') {
    include "Views/Bangluong.php";
} else if ($controller == 'baocaodoanhthu') {
    include "Views/Baocaodoanhthu.php";
}
