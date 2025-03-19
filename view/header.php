<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHILLIES STORE</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/view.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.php?act=return">CHILLIES STORE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <form action="index.php?act=sanpham" method="post" class="d-flex me-3" role="search">
          <input class="form-control me-2" name="kyw" type="search" placeholder="Tìm kiếm..." aria-label="Search" value="<?php echo isset($_POST['kyw']) ? $_POST['kyw'] : ''; ?>">
          <button class="btn btn-outline-success" type="submit">Tìm</button>
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?act=return">Trang chủ</a>
          </li>
          <li class="nav-item dropdown">
            <?php if(isset($_SESSION['user'])): ?>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo htmlspecialchars($_SESSION['user']['name']); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarrDropdown">
                <li><a class="dropdown-item" href="index.php?act=quenmk">Quên Mật Khẩu</a></li>
                <li><a class="dropdown-item" href="index.php?act=updatett">Thông tin</a></li>
                <li><hr class="dropdown-divider"></li>
                <?php if($_SESSION['user']['role'] == 1): ?>
                  <li><a class="dropdown-item" href="index.php?act=admin">Đăng nhập Admin</a></li>
                <?php endif; ?>
                <li><a href="index.php?act=mybill" class="dropdown-item">Chi tiết đơn hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="index.php?act=dangxuat" class="dropdown-item">Đăng Xuất</a></li>
              </ul>
            <?php else: ?>
              <a class="nav-link" href="index.php?act=login">Tài Khoản</a>
            <?php endif; ?>
          </li>
          <li class="nav-item mx-lg-2">
              <a href="index.php?act=addcart" class="btn btn-outline-primary position-relative">
                  <i class="bi bi-cart3"></i> Giỏ Hàng
              </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>