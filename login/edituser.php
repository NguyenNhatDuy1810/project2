<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thông tin người dùng - 2025</title>
  <!-- Sử dụng Bootstrap 5.3 -->
  <link rel="stylesheet" href="../css/edituser.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card">
          <div class="card-header text-center">
            <h3>Cập nhật thông tin người dùng</h3>
          </div>
          <?php
            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                extract($_SESSION['user']);
            }
          ?>
          <div class="card-body">
            <form action="index.php?act=updatett" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="name" class="form-label">Họ và Tên</label>
                <input type="text" name="name" id="name" class="form-control" value="<?=$name?>" required>
              </div>
              <div class="mb-3">
                <label for="tel" class="form-label">Số điện thoại</label>
                <input type="text" name="tel" id="tel" class="form-control" value="<?=$tel?>" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?=$email?>" required>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" value="<?=$address?>" required>
              </div>
              <div class="mb-3">
                <label for="pass" class="form-label">Mật khẩu</label>
                <input type="password" name="pass" id="pass" class="form-control">
                <input type="hidden" name="passm" value="<?=$pass?>">
              </div>
              <!-- Hidden field cho id -->
              <input type="hidden" name="id" value="<?=$id?>">
              <div class="d-grid gap-2">
                <button type="submit" name="capnhat" class="btn btn-primary btn-lg">Cập Nhật</button>
              </div>
              <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo '<div class="mt-3 alert alert-info">' . $thongbao . '</div>';
                }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
