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
    <link rel="stylesheet" href=".../admin.css">
</head>
<body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Cập Nhật Danh Mục</h1>
                <form action="index.php?act=updatedm" method="post" class="mt-4">
                    <div class="mb-3">
                        <label for="maloai" class="form-label">Mã Loại</label>
                        <input type="text" name="maloai" id="maloai" class="form-control" value="<?php if (isset($id)) echo $id;?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tenloai" class="form-label">Tên Loại</label>
                        <input type="text" class="form-control" name="tenloai" id="tenloai"
                        value="<?php if (isset($name)&&($name!="")) echo $name;?>">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id; ?>">
                        <button type="submit" name="capnhat" class="btn btn-primary">Cập Nhật</button>
                        <button type="reset" class="btn btn-secondary">Nhập lại</button>
                        <a href="index.php?act=listdm" class="btn btn-info">Danh Sách</a>
                    </div>
                    <?php
                    if(isset($thongbao)&&($thongbao!="")) {
                        echo '<div class="alert alert-info">' . $thongbao . '</div>';
                    }?>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
