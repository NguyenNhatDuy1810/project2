<?php
include "home.php";
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1 class="text-center my-4">Thêm Mới Sản Phẩm</h1>

            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
                <!-- Danh mục -->
                <div class="mb-3">
                    <label for="iddm" class="form-label">Danh mục <span class="text-danger">*</span></label>
                    <select name="iddm" id="iddm" class="form-select" required>
                        <option value="" disabled selected>Chọn danh mục...</option>
                        <?php foreach ($listdanhmuc as $danhmuc): ?>
                            <option value="<?= $danhmuc['id'] ?>"><?= htmlspecialchars($danhmuc['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="tensp" class="form-label">Tên Sản Phẩm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tensp" name="tensp" placeholder="Nhập tên sản phẩm" required>
                </div>

                <!-- Giá nhập -->
                <div class="mb-3">
                    <label for="gianhapsp" class="form-label">Giá Nhập (VNĐ) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="gianhapsp" name="gianhapsp" placeholder="Nhập giá nhập" required min="0">
                </div>

                <!-- Giá bán -->
                <div class="mb-3">
                    <label for="giasp" class="form-label">Giá Bán (VNĐ) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="giasp" name="giasp" placeholder="Nhập giá bán" required min="0">
                </div>
                 
                <!-- Giảm giá -->
                <div class="mb-3">
                    <label for="gia_giam" class="form-label">Giảm giá <span class="text-danger">*</span></label>
                    <input type="number" min="0"  step="1" class="form-control" id="gia_giam" name="gia_giam" placeholder="Giá Giảm" required min="0">
                </div>

                <!-- Số lượng -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số Lượng <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng" required min="1">
                </div>

                <!-- Ảnh sản phẩm -->
                <div class="mb-3">
                    <label for="hinh" class="form-label">Hình Ảnh <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="hinh" name="hinh" required>
                </div>

                <!-- Mô tả -->
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="mota" name="mota" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>

                <!-- Nút Submit -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="themmoi" value="Thêm Mới"><i class="bi bi-plus-circle"></i> Thêm Mới</button>
                    <button type="reset" class="btn btn-secondary" value="Nhập Lại"><i class="bi bi-arrow-clockwise"></i> Nhập lại</button>
                    <a href="index.php?act=listsp" class="btn btn-outline-primary"><i class="bi bi-list"></i> Danh Sách</a>
                </div>

                <!-- Hiển thị thông báo -->
                <?php if (!empty($thongbao)): ?>
                    <div class="alert alert-info mt-3"><?= htmlspecialchars($thongbao) ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
