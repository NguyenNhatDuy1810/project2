<?php
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";

if (isset($_GET['act'])) {
    $act=$_GET['act'];
    switch ($act) {
        case 'return':
            header("Location: index.php");
            exit();
        case 'listdm':
            $listdanhmuc=loading_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai=$_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";               
            } 
            $listdanhmuc= loading_danhmuc();
            include "danhmuc/add.php";
            break;
        case 'xoadm':
                if (isset($_GET['id']) && $_GET['id']>0) {
                    $thongbao = delete_danhmuc($_GET['id']);
                }
                $listdanhmuc=loading_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
                if (isset($_GET['id']) && $_GET['id']>0) {
                    $dm=load1_danhmuc($_GET['id']);
                }
            include "danhmuc/update.php";
            break;    
        case 'updatedm':
         if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
            $tenloai=$_POST['tenloai'];
            $id=$_POST['id'];
            update_danhmuc($id,$tenloai);
            $thongbao="Cập nhật thành công";
         }
         
            $listdanhmuc = loading_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'back':
            Header("Location: ../index.php");
            exit();
        default:
        include "home.php";
        break;
}            
} else {
include "home.php";
}
include "footer.php";
?>