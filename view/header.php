<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHILLIES STORE</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php?act=return">CHILLIES STORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <form class="d-flex me-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Tìm</button>
      </form>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
        </li>
        <li class="nav-item dropdown">
          <?php if(isset($_SESSION['user'])):?>
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo htmlspecialchars($_SESSION['user']['name']); ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?act=listdm">Tài Khoản</a></li>
            <li><a class="dropdown-item" href="#">Thông tin</a></li>
            <li><hr class="dropdown-divider"></li>
            <?php if($_SESSION['user']['role'] == 1): ?>
            <li><a class="dropdown-item" href="index.php?act=admin">Đăng nhập Admin</a></li>
            <?php endif; ?>
            <li><a href="index.php?act=ctdh" class="dropdown-item">Chi tiết đơn hàng</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="index.php?act=out" class="dropdown-item">Đăng Xuất</a></li>
          </ul>
          <?php else: ?>
          <a class="nav-link" href="index.php?act=login">Tài Khoản</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
    <!-- Chuyển đổi chế độ sáng/tối
    <div class="form-check form-switch ms-3">
      <input class="form-check-input" type="checkbox" id="themeSwitch">
      <label class="form-check-label" for="themeSwitch">
        <i class="bi bi-brightness-high-fill"></i> <i class="bi bi-moon-fill"></i>
      </label>
    </div> -->
  </div>
</nav>

