<?php
session_start();
include "../model/pdo.php";
include "../model/taikhoan.php";

if (isset($_GET['act']) && !empty($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                if (isset($_POST['user']) && isset($_POST['pass'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];

                    $checkuserlogin = checkuserlogin($user, $pass);
                    if (is_array($checkuserlogin)) {
                        $_SESSION['user'] = $checkuserlogin;
                        header('Location: ../index.php');
                        exit(); 
                    } else {
                        $thongbao = "Thông tin tài khoản hoặc mật khẩu không chính xác vui lòng nhập lại";
                    }
                } else {
                    $thongbao = "Vui lòng nhập đầy đủ thông tin đăng nhập.";
                }
            }
            include "login.php";
            break;

        case 'dangky':
            if (isset($_POST['dangky'])) {
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['xnpass'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $xnpass = $_POST['xnpass'];

                  
                    if ($pass === $xnpass) {
                        
                        if (username_exists($user)) {
                            $thongbao = "Tài khoản đã tồn tại. Vui lòng nhập tên tài khoản khác.";
                        } else {
                            
                            insert_taikhoan($name, $email, $user, $pass);
                            $thongbao = "Chúc mừng bạn đã đăng ký thành công!";
                        }
                    } else {
                        $thongbao = "Mật khẩu xác nhận không khớp.";
                    }
                } else {
                    $thongbao = "Vui lòng nhập đầy đủ thông tin đăng ký.";
                }
            }
            include "login.php";
            break;

            case'quenmk':
                    if(isset($_POST['email'])&&($_POST['email'])){
                        $email = $_POST['email'];
                        
                        $checkemail=checkemail($email);
                      if (is_array($checkemail)) {
                        $thongbao="Mật khẩu của bạn là".$checkemail['pass'];
                      }else {
                        $thongbao="Thông tin email không chính xác";
                      }
                    }
                include "quenmk.php";
                break;
    
        case 'updatett':
            if (isset($_POST['capnhat'])) {
             
                if (isset($_POST['name'], $_POST['email'], $_POST['address'], $_POST['tel'], $_POST['id'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $id = $_POST['id'];

                    if (!empty($_POST['pass'])) {
                        $pass = $_POST['pass'];
                    } else {
                        $pass = $_POST['passm']; 
                    }

                    updateUser($id, $name, $email, $address, $tel, $pass);
                    
                    $checkuser = checkuser($email, $pass);
                    if (is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        header('Location: ../index.php');
                        exit(); 
                    } else {
                        $thongbao = "Có lỗi xảy ra khi kiểm tra thông tin người dùng sau khi cập nhật.";
                    }
                } else {
                    $thongbao = "Có lỗi xảy ra khi cập nhật thông tin.";
                }
            } else {
                $thongbao = "Vui lòng nhập đầy đủ thông tin.";
            }
            include "edituser.php";
            break;
            case 'dangxuat':
                $_SESSION = array();
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }
        
                session_destroy();
        
                
                header("Location: ../index.php");
                exit();
           
       default:
            include "login.php";
            break;
    }
} else {
    include "login.php";
}
?>
