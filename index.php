<?php
    include "view/header.php";
    include "model/pdo.php";


    if (isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'value':
                # code...
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