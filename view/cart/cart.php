<link rel="stylesheet" href=".../../css/cart.css">
<main>
    <div class="container">
        <h1>GIỎ HÀNG CỦA TÔI</h1>
        <div id="cart">
            <form action="index.php?act=updatecart" method="post" id="sanphamForm">
                <table id="cart-table">
                    <thead>
                        <tr>
                            <th>Chọn</th>
                            <th>Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        <?php
                        $tong = 0;
                        if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
                            foreach ($_SESSION['mycart'] as $index => $cart) {
                                $hinh = $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                echo '<tr>
                                        <td><input type="checkbox" name="selected[]" value="'.$index.'" onchange="updateTotal()"></td>
                                        <td><img src="' . $hinh . '" alt="" height="80px"></td>
                                        <td>' . $cart[1] . '</td>
                                        <td>' . number_format($cart[3]) . ' VNĐ</td>
                                        <td>
                                            <input type="number" name="quantity[' . $index . ']" value="' . $cart[4] . '" min="0" style="width: 60px; text-align: center;" onchange="updateTotal()">
                                        </td>
                                        <td class="item-total">' . number_format($ttien) . ' VNĐ</td>
                                        <td>
                                            <button type="submit" name="updatecart" class="btn-update">Cập nhật</button>
                                            <a href="index.php?act=deletecart&item=' . $index . '" class="btn-remove">Xóa</a>
                                        </td>
                                    </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7">Giỏ hàng trống</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div id="cart-summary">
                    <h2>Chi tiết hóa đơn</h2>
                    <p>Tổng số sản phẩm: <span id="total-items"><?php echo count($_SESSION['mycart']); ?></span></p>
                    <p>Tổng tiền: <span id="total-price">0 VNĐ</span></p>
                    <button type="button" class="btn-order" onclick="location.href='index.php?act=bill'">Đặt hàng</button>
                    
                    <div class="select-all">
                        <button type="button" class="btn-primary" onclick="selectAll()">Chọn tất cả</button>
                        <button type="button" class="btn-primary" onclick="deselectAll()">Bỏ chọn tất cả</button>
                        
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src=".../../js/cart.js">
    </script>
</main>