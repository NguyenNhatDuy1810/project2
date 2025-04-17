<?php
ob_start(); // Bật bộ đệm đầu ra
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: ../login/login.php");
    exit();
   }
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";



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
                $import_price = $_POST['gianhapsp'];
                $giasp = $_POST['giasp'];
                $hinh = $_FILES['hinh']['name'];
                $mota = $_POST['mota'];
                $quantity = $_POST['quantity'];
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                if(isset($_POST['gia_giam'])&& ($_POST['gia_giam'])>0){
                    $discount=$_POST['gia_giam'];
                }else {
                    $discount=null;
                }
                insert_sanpham($tensp,$import_price, $giasp, $hinh, $mota,$quantity, $iddm,$discount);
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
        case 'xoasp':
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loading_sanpham("", 0);
                include "sanpham/list.php";
                break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id=$_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $import_price = $_POST['gianhapsp'];
                $giasp = $_POST['giasp'];
                $quantity = $_POST['quantity'];
                $mota = $_POST['mota'];
                $discount = isset($_POST['gia_giam']) && $_POST['gia_giam'] > 0 ? $_POST['gia_giam'] : null;

            if (isset($_FILES['hinh']) && $_FILES['hinh']['error']=== UPLOAD_ERR_OK) {
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
            }else {
                $sanpham = load1_sanpham($id);
                $hinh = $sanpham['img'];
            }
            update_sanpham($id, $iddm, $tensp,$import_price, $giasp,$quantity, $mota, $hinh,$discount);
            $thongbao = "Cập Nhật thành công";
            }
            $listdanhmuc = loading_danhmuc();
            $listsanpham = loading_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'dskh':
            $listtaikhoan=loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'xoatk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $thongbao = delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'deleteSelected10':
            if (isset($_POST['selected']) && !empty($_POST['selected'])) {
                $thongbao = "";
                $ids = $_POST['selected'];
                    foreach ($ids as $id) {
                        $result = delete_taikhoan($id);
                        $thongbao .= "Danh mục ID $id: $result<br>";
                    }
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;

        case 'suatk':
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $tk = load1_tk($_GET['id']);
                }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/update.php";
            break;

        case 'update_taikhoan':
            if(isset($_POST['capnhat']) && $_POST['capnhat']){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pass = $_POST['pass'];
                $role = $_POST['role'];
                      
                updateUseradmin($id, $name, $email, $address, $tel, $pass,$role);
                    $thongbao = "Cập Nhật thành công";
                }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
                      
  
        case 'dsbl':
                $listbl=loading_binhluan(0);
                include "binhluan/list.php";
                break;    

        case 'xoabl':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $thongbao = delete_bl($_GET['id']);
             }
            $listbl = loading_binhluan(0);
            include "binhluan/list.php";
            break;

        case 'deleteSelected':
                if (isset($_POST['selected']) && !empty($_POST['selected'])) {
                    $thongbao = "";
                    $ids = $_POST['selected'];
                    foreach ($ids as $id) {
                        $result = delete_bl($id);
                        $thongbao .= "Danh mục ID $id: $result<br>";
                        }
                    }
                $listtaikhoan = loading_binhluan();
                include "binhluan/list.php";
                break;
        case 'listbill':
                $listbill=  loadall_bill(0);
            include "bill/list.php";
            break;
        case 'deleteOrder':
            if (isset($_GET['id'])) {
                delete_order($_GET['id']);
                $thongbao = "Xóa đơn hàng thành công!";
            }
            $listbill = loadall_bill(0);
            include "bill/list.php";
             break;
                  
        case 'editOrder':
            if (isset($_GET['id'])) {
                $order = get_order_by_id($_GET['id']);
                include "bill/edit.php";
                }
            break;
                  
        case 'updateOrder':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $name = $_POST['bill_name'];
                $email = $_POST['bill_email'];
                $address = $_POST['bill_address'];
                $tel = $_POST['bill_tel'];
                $total = $_POST['total'];
                $status = $_POST['bill_status'];
                update_order($id, $name, $email, $address, $tel, $total, $status);
                $thongbao = "Cập nhật đơn hàng thành công!";
            }
            $listbill = loadall_bill(0);
            include "bill/list.php";
             break;  
             case 'tdt':
                if (isset($_POST['search_date']) && !empty($_POST['search_date'])) {
                    $search_date = trim($_POST['search_date']); // Lấy ngày nhập tay
                    
                    
                    
                    $listdoanhthu = timKiemDonHangTheoNgay($search_date); 
                } else {
                    $listdoanhthu = doanhthuTheoNgay(); 
                }
                include "doanhthu/tdt.php";
                break;
            
        case 'backadmin':
            Header("Location: ../admin/index.php");
            exit();
            case 'dangxuat':
                header("Location: ../login/index.php?act=dangxuat");
                exit();
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