<?php
if(isset($_SESSION['user'])){
    $name = $_SESSION['user']['name'];
    $address = $_SESSION['user']['address'];
    $email = $_SESSION['user']['email'];
    $tel = $_SESSION['user']['tel'];
} else {
    header('Location: /project2/login/login.php');
    exit();
}
?>
<link rel="stylesheet" href=".../../css/cart.css">
<main>
    <div class="container mt-3">
        <h1>THÔNG TIN ĐẶT HÀNG</h1>
        <div id="order">
            <form action="index.php?act=confirmbill" method="post">
                <table id="order-table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody id="order-items">
                        <?php
                        $tong = 0;
                        if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
                            foreach ($_SESSION['mycart'] as $index => $cart) {
                                $hinh = $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                echo '<tr>
                                        <td><img src="' . $hinh . '" alt="" height="80px"></td>
                                        <td>' . $cart[1] . '</td>
                                        <td>' . number_format($cart[3]) . ' VNĐ</td>
                                        <td>' . $cart[4] . '</td>
                                        <td>' . number_format($ttien) . ' VNĐ</td>
                                    </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5">Giỏ hàng trống</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="order-summary">
                    <h2>Chi tiết hóa đơn</h2>
                    <p>Tổng số sản phẩm: <span id="total-items"><?php echo count($_SESSION['mycart']); ?></span></p>
                    <p>Tổng tiền: <span id="total-price"><?php echo number_format($tong); ?> VNĐ</span></p>
                    <h2>Thông tin khách hàng</h2>
                    <p>Họ và tên: <input type="text" name="fullname" value="<?php echo $name; ?>" required></p>
                    <p>Email: <input type="email" name="email" value="<?php echo $email; ?>" required></p>
                    <p>Số điện thoại: <input type="tel" name="phone" value="<?php echo $tel; ?>" required></p>
                    <p>Địa chỉ: <input type="text" name="address" value="<?php echo $address; ?>" required></p>
                    <h2>Phương thức thanh toán</h2>
                    <div class="payment-methods">
                        <label>
                            <!-- <input type="radio" name="payment-method" value="visa" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" class="payment-icon">
                        </label>
                        <label>
                            <input type="radio" name="payment-method" value="mastercard" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/MasterCard_Logo.svg" alt="MasterCard" class="payment-icon">
                        </label> -->
                        <!-- <label>
                            <input type="radio" name="payment-method" value="paypal" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="payment-icon">
                        </label>
                        <label> -->
                            <input type="radio" name="payment-method" value="cash" required>
                            <img src="https://tropicfarm.vn//upload/ckfinder/images/payment.jpg" alt="Cash" class="payment-icon">
                            <span>Thanh toán khi nhận hàng</span>
                        </label>
                        <!-- <label>
                            <input type="radio" name="payment-method" value="bank" required>
                            <img src="../DUAN/images/bank.png" alt="Bank Transfer" class="payment-icon">
                            <span>Thanh toán qua ngân hàng</span>
                        </label> -->
                    </div>
                    <button type="submit" class="btn-confirm">Xác nhận đơn hàng</button>
                    <button type="button" class="btn-cancel" onclick="location.href='index.php?act=cancelorder'">Hủy đơn hàng</button>
                </div>
            </form>
        </div>
    </div>
</main>

