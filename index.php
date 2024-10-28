<?php
session_start();    
    include "view/header.php";
    include "model/pdo.php";


    if (isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'return':
                header("Location: index.php");
                exit();
            case 'login':
                header("Location: login/login.php");
                exit();
            case 'admin':
                header("Location: admin/index.php");
                exit();
            default:
                include "view/home.php";
                break;
        }
    }else {
        include "view/home.php";
        }
        include "view/footer.php";
?>