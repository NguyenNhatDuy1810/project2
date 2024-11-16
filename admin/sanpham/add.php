<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/sanphamadmin.css">
    <title>Thêm Mới Sản Phẩm</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row frmtitle">
                <h1>Thêm Mới Sản Phẩm</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="iddm" class="form-label">Danh mục</label>
                        <select name="iddm" id="iddm" class="form-select">
                            <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    echo '<option value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tensp" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="tensp" name="tensp">
                    </div>
                    <div class="mb-3">
                        <label for="giasp" class="form-label">Giá</label>
                        <input type="text" class="form-control" id="giasp" name="giasp">
                    </div>
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Hình</label>
                        <input type="file" class="form-control" id="hinh" name="hinh">
                    </div>
                    <div class="mb-3">
                        <label for="mota" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="mota" name="mota" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" name="themmoi" value="Thêm Mới">
                        <input type="reset" class="btn btn-secondary" value="Nhập lại">
                        <a href="index.php?act=listsp" class="btn btn-outline-primary">Danh Sách</a>
                    </div>
                    <?php
                        if(isset($thongbao) && $thongbao != "") {
                            echo '<div class="alert alert-info">' . $thongbao . '</div>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
