<?php
    if (is_array($dm)) {
        extract($dm);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT DANH MỤC</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/danhmuc.css">
</head>
<body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Cập Nhật Danh Mục</h1>
                <form action="index.php?act=updatedm" method="POST" class="mt-4">
                    <div class="mb-3">
                        <label for="maloai" class="form-label">Mã loại</label>
                        <input type="text" id="maloai" name="maloai" class="form-control"value="<?php if (isset($id) && ($id > 0)) { echo $id; } ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tenloai" class="form-label">Tên loại</label>
                        <input type="text" id="tenloai" name="tenloai" class="form-control" value="<?php if (isset($name) && ($name != "")) { echo $name; } ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) { echo $id; } ?>">
                    <div class="d-flex gap-2">
                        <input type="submit" name="capnhat" class="btn btn-primary flex-fill" value="Cập Nhật">
                        <button type="reset" class="btn btn-secondary flex-fill">Nhập lại</button>
                        <a href="index.php?act=listdm" class="btn btn-info flex-fill text-white">Danh Sách</a>
                    </div>
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo '<div class="alert alert-info mt-3">' . $thongbao . '</div>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</html>
