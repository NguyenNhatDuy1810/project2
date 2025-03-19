<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/taikhoan.css">
    <title>Forget Your Password</title>
</head>
<body>
    <div class="container">
        <div class="form-container remake-password">
            <form action="index.php?act=quenmatkhau" method="post">
                <h1>Forget Your Password</h1>
                <p>Vui lòng điền email và số điện thoại của bạn!</p>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="tel" name="tel" id="tel" placeholder="Tel" required>
                <button type="submit" name="guiemail" class="btn btn-primary">Xác nhận</button>
                <button type="button" onclick="window.location.href='index.php?act=dangnhap'" class="btn btn-secondary">Trở về</button>
            </form>
        </div>

        <?php 
        if (isset($thongbao) && !empty($thongbao)) : ?>
            <div id="popup-thongbao" class="popup-thongbao">
                <div class="popup-content">
                    <span id="close-popup">&times;</span>
                    <p><?php echo htmlspecialchars($thongbao); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="../js/forgetpass.js"></script>
</body>
</html>
