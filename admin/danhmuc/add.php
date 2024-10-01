<?php
    include "home.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">
                Thêm Danh Mục
            </h1>
        </div>
        <div class="row">
            <form action="index.php?act=adddm" method="POST">
                <div class="col-mb-10 mb-3">
                    <label for="maloai" class="form-label">Mã Loại</label>
                    <input type="text" class="form-control" id="maloai" name="maloai" disabled>
                </div>
                <div class="col-mb-10 mb-3">
                    <label for="tenloai" class="form-label">Tên Loại</label>
                    <input type="text" class="form-control" id="tenloai" name="tenloai">
                </div>
                <div class="col-mb-10 mb-3">
                    <input type="submit" class="btn btn-primary" name="themmoi" value="Thêm Mới">
                    <input type="reset" class="btn btn-primary" value="Nhập lại">
                    <a href="index.php?act=listdm" class="btn btn-outline-primary">Danh sách</a>
                </div>
                <?php
                    if (isset($thongbao) && $thongbao != "" ) {
                        echo '<div class="col-mb-10 mb-3"> ' .$thongbao. ' </div>';
                    }
                ?>
            </form>
        </div>
    </div>
</div>