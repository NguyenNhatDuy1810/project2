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
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            }else {
                $kyw='';
                $iddm = $_POST['iddm'] ?? 0;
            }
            $listdanhmuc = loading_danhmuc();
            $listsanpham = loading_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'addsp':
            if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $hinh = $_FILES['hinh']['name'];
                $mota = $_POST['mota'];
                
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loading_danhmuc();
            include "sanpham/add.php";
            break;
            case 'suasp':
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    $sp = load1_sanpham($_GET['id']);
                }
                $listdanhmuc = loading_danhmuc();
                include "sanpham/update.php";
                break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id=$_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];

                if (isset($_FILES['hinh']) && $_FILES['hinh']['error']=== UPLOAD_ERR_OK) {
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../images/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                }else {
                    $sanpham = load1_sanpham($id);
                    $hinh = $sanpham['img'];
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "Cập Nhật thành công";
            }
            $listdanhmuc = loading_danhmuc();
            $listsanpham = loading_sanpham("", 0);
            include "sanpham/list.php";
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