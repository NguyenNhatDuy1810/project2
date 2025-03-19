<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Hóa Đơn</title>

    <link rel="stylesheet" href=".../../css/cart.css">
</head>
<maim>
    <div class="container">
        <?php
            $name = $_POST['fullname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $tel = $_POST['phone'];
            $paymentMethod = $_POST['payment-method'];
            $totalItems = count($_SESSION['mycart']);
            $totalPrice = 0;

            foreach ($_SESSION['mycart'] as $cart) {
                $totalPrice += $cart[3] * $cart[4];
            }

            $ngaydathang = date('d/m/Y');
        ?>
        <h1>XÁC NHẬN HÓA ĐƠN</h1>
        <div class="order-summary">
            <h2>Chi tiết hóa đơn</h2>
            <p>Ngày đặt hàng: <?php echo $ngaydathang; ?></p>
            <p>Tổng số sản phẩm: <?php echo $totalItems; ?></p>
            <p>Tổng tiền: <?php echo number_format($totalPrice); ?> VNĐ</p>
        </div>
        <div class="order-details">
            <h2>Chi tiết sản phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['mycart'] as $cart) {
                        $hinh = $cart[2];
                        $ttien = $cart[3] * $cart[4];
                        echo '<tr>
                                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                                <td>' . $cart[1] . '</td>
                                <td>' . number_format($cart[3]) . ' VNĐ</td>
                                <td>' . $cart[4] . '</td>
                                <td>' . number_format($ttien) . ' VNĐ</td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="customer-details">
            <h2>Thông tin khách hàng</h2>
            <p>Họ và tên: <?php echo $name; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Số điện thoại: <?php echo $tel; ?></p>
            <p>Địa chỉ: <?php echo $address; ?></p>
        </div>
        <form action="index.php?act=completeorder" method="post">
            <input type="hidden" name="fullname" value="<?php echo $name; ?>">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="phone" value="<?php echo $tel; ?>">
            <input type="hidden" name="total-items" value="<?php echo $totalItems; ?>">
            <input type="hidden" name="total-price" value="<?php echo $totalPrice; ?>">
            <input type="hidden" name="ngaydathang" value="<?php echo $ngaydathang; ?>">
            <button type="submit" class="btn-confirm" name="completeorder" value="1">Hoàn tất đặt hàng</button>
            <button type="button" class="btn-cancel" onclick="location.href='index.php?act=cancelorder'">Hủy đơn hàng</button>
        </form>
    </div>
                </main>
</html>