<?php
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";

if (isset($_GET['act'])) {
    $act=$_GET['act'];
    switch ($act) {
        case 'listdm':
            $listdanhmuc=loading_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai=$_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";               
            } include "danhmuc/add.php";
            break;
        default:
        include "home.php";
        break;
}            
} else {
include "home.php";
}
// include "footer.php";
?>