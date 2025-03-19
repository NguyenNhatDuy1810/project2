<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login/login.php');
    exit();
}
$user = $_SESSION['user']['name'];
$name = $_SESSION['user']['name'];
$address = $_SESSION['user']['address'];
$email = $_SESSION['user']['email'];
$tel = $_SESSION['user']['tel'];
?>
<link rel="stylesheet" href=".../../css/cart.css">
<main>
    <div class="container">
        <h1>Đơn hàng của tôi</h1>
        <table class="orders-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số lượng</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
               
                foreach ($listbill as $bill) {
                    extract($bill);
                    $kh=$bill["bill_name"].'
                    <br>'.$bill["bill_email"].'
                    <br>'.$bill["bill_address"].'
                    <br>'.$bill["bill_tel"];
                    $ttdh=get_ttdh($bill["bill_status"]);

                    $countsp=loadall_cart_count($bill["id"]);
                    echo '<tr>
                            <td></td>
                            <td>DH' .$bill['id'] . '</td>
                            <td>' .  $ngaydathang . '</td>
                            <td>' .$ttdh. '</td>
                            <td>' .  $total . '</td>
                            <td>'.$name.'</td>
                            <td>' . $countsp . '</td>';
                }   
                  
               ?>
            </tbody>
        </table>
    </div>
            </main>
