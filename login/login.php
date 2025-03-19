<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/taikhoan.css">
    <title>Login Page</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="index.php?act=dangky" method="POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="text" name="user" id="user" placeholder="User Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="pass" id="pass" placeholder="Password">
                <input type="password" name="xnpass" id="xnpass" class="form-control" placeholder="Confirm Password">
                <button type="submit" name="dangky" class="btn btn-primary">Sign up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="index.php?act=dangnhap" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="text" name="user" id="user"  placeholder="User Name">
                <input type="password" name="pass" id="pass" placeholder="Password">
                <a href="index.php?act=quenmatkhau">Forget Your Password?</a>
                <button type="submit" name="dangnhap" class="btn btn-primary">Sign In</button>
            </form>

        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
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
    <script src="../js/taikhoan.js"></script>
</body>

</html>