<?php
include "home.php";
?>
<?php
if(is_array($sp)){
    extract($sp);
}
$hinhPath = "../images/".$img;
if (file_exists($hinhPath)) {
    $hinhHTML = "<img src='" . $hinhPath . "' class='img-thumbnail' style='width: 100px;'>";
} else {
    $hinhHTML = "<span class='text-muted'>Không có ảnh minh họa</span>";
}
?>

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 mb-0">Cập nhật sản phẩm</h2>
        </div>
        <div class="card-body">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="iddm" class="form-label">Danh mục</label>
                    <select name="iddm" id="iddm" class="form-select">
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            $selected = ($danhmuc['id'] == $iddm) ? 'selected' : '';
                            echo '<option value="'.$danhmuc['id'].'" '.$selected.'>'.$danhmuc['name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="masp" class="form-label">Mã Sản Phẩm</label>
                    <input type="text" class="form-control" id="masp" name="masp" value="<?=$id?>" disabled>
                </div>
                
                <div class="mb-3">
                    <label for="tensp" class="form-label">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="tensp" name="tensp" value="<?=$name?>">
                </div>
                
                <div class="mb-3">
                    <label for="gianhapsp" class="form-label">Giá Nhập</label>
                    <input type="text" class="form-control" name="gianhapsp" value="<?=$import_price?>">
                </div>

                <div class="mb-3">
                    <label for="giasp" class="form-label">Giá</label>
                    <input type="text" class="form-control" name="giasp" value="<?=$price?>">
                </div>
                
                 <div class="mb-3">
                    <label for="gia_giam" class="form-label">Giảm giá(%) <span class="text-danger">*</span></label>
                    <input type="number" min="0"  step="1" class="form-control" id="gia_giam" name="gia_giam" placeholder="Giá Giảm" required min="0">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?=$quantity?>">
                </div>

                <div class="mb-3">
                    <label for="hinh" class="form-label">Hình</label>
                    <input type="file" class="form-control" name="hinh">
                    <div class="mt-2"><?=$hinhHTML?></div>
                </div>
                
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="mota" name="mota" rows="3"><?=$mota?></textarea>
                </div>

                <input type="hidden" name="id" value="<?=$id?>">
                
                <div class="d-flex justify-content-between mt-4">
                    <input type="submit" class="btn btn-primary" name="capnhat" value="Cập Nhật">
                    <button type="reset" class="btn btn-secondary">Nhập lại</button>
                    <a href="index.php?act=listsp" class="btn btn-outline-primary">Danh Sách</a>
                </div>
            
                <div class="thongbao mt-4">
                <?php
                if(isset($thongbao) && $thongbao != "") {
                    echo '<div class="alert alert-info mt-3">'.$thongbao.'</div>';
                }
                ?>
                </div>
        
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
