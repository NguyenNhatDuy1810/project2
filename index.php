<?php
session_start();    
    include "view/header.php";
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/cart.php";
    include "global.php";
//load data
    $spnew = load1_sanpham_home();
    $dsdm = loading_danhmuc();
    $dst10 = load1_sanpham_top10();
    $dstbigsale = load1_sanpham_giamgia();

    if (isset($_GET['act']) && !empty($_GET['act'])) {
        $act=$_GET['act'];
        
        switch ($act) {
            case 'sanpham':
                $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
                $iddm = isset($_POST['iddm']) ? $_POST['iddm'] : (isset($_GET['iddm']) ? $_GET['iddm'] : 0);
                $dssp = loading_sanpham($kyw, $iddm);
                $tendanhmuc = load1_tendanhmuc($iddm);
                include "view/sanpham.php";
            break;
            case 'sanphamct':
                if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                    $id = $_GET['idsp'];
                    viewsp($id);
            
                    $onesp = load1_sanpham($id);
                    if (is_array($onesp)) {
                        extract($onesp);
                        $spcungloai = load_sanpham_cungloai($id, $iddm);
                        $tendanhmuc = load1_tendanhmuc($iddm);
                        include "view/sanphamct.php";
                    } else {
                        echo 'LỖI 404 KHÔNG TÌM THẤY';
                    }
                } else {
                    echo 'LỖI 404 KHÔNG TÌM THẤY';
                }
                break;
            
            case 'addcart':
                if (isset($_SESSION['user'])) {
                    if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
                    if (isset($_POST['addcart'])) {  
                        $id = $_POST['id'];
                        viewsp($id);
                
                        $name = $_POST['name'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];
                        $soluong = 1;
                        $ttien = $soluong * $price;
                        $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                
                        array_push($_SESSION['mycart'], $spadd);
                
                        header("Location: index.php");
                        exit();
                    }
                } else {
                    
                    header("Location: login/login.php");
                    exit();
                }
                    include "view/cart/cart.php";
                    break;
            case 'updatecart':
                if (isset($_POST['updatecart'])) {
                    foreach ($_POST['quantity'] as $id => $quantity) {
                    if ($quantity == 0) {
                         unset($_SESSION['mycart'][$id]);
                    } else {
                    $_SESSION['mycart'][$id][4] = $quantity;
                    $_SESSION['mycart'][$id][5] = $_SESSION['mycart'][$id][3] * $quantity;
                    }
                }
             }
                include "view/cart/cart.php";
                break;
            case 'deletecart':
                if (isset($_GET['item'])) {
                    $id = $_GET['item'];
                    unset($_SESSION['mycart'][$id]);
                    $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                }
                include "view/cart/cart.php";
                break;
            case 'bill':
                include "view/cart/bill.php";
                break;
            case 'confirmbill':
                include 'view/cart/confirmbill.php';
                break;
            case 'completeorder':
                if (isset($_POST['completeorder']) && ($_POST['completeorder'])) {
                    $name = $_POST['fullname'];
                    $address = $_POST['address'];
                    $tel = $_POST['phone'];
                    $email = $_POST['email'];
                    
                    $ngaydathang = $_POST['ngaydathang'];
                    $totalPrice = $_POST['total-price'];
            
                    $idbill = insertbill($name, $address, $tel, $email, $ngaydathang, $totalPrice);
            
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }
            
                    $_SESSION['mycart'] = [];                     
                    $listbill = loadone_bill($idbill);
                    $billct=loadall_cart($idbill);

                include 'view/cart/completed.php';
            }
                break;
            case 'mybill':
                
                $listbill=  loadall_bill(0);
                
                include "view/cart/mybill.php";
                break;
            case 'cancelorder':
                unset($_SESSION['mycart']);
                header('Location: index.php');
                
                break;
            case 'return':
                header("Location: index.php");
                exit();
            case 'login':
                header("Location: login/login.php");
                exit();
            case 'admin':
                header("Location: admin/index.php");
                exit();
            case 'updatett':
                header("Location: ./login/index.php?act=updatett");
                exit();
            case 'dangxuat':
                header("Location: ./login/index.php?act=dangxuat");
                exit();
            case 'submit_comment':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $idpro = $_POST['idpro'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $comment = $_POST['comment'];
        
                    $sql = "INSERT INTO binhluan (idpro, name, email, comment) VALUES (?, ?, ?, ?)";
                    pdo_execute($sql, $idpro, $name, $email, $comment);
        
                    $thongbao = "Bình luận đã được thêm thành công.";
                 }
                 $idpro = $_POST['idpro'];
                include "view/binhluan/display_comments.php?idpro=$idpro";
                 break;
            default:
                include "view/home.php";
                break;
        }
    }else {
        include "view/home.php";
        }
        include "view/footer.php";
?>
