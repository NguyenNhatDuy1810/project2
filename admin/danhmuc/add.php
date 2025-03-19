<?php
include "home.php";
?>
<main>
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
            </form>
        </div>
    </div>
</div>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <?php echo isset($thongbao) ? $thongbao : ''; ?>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var toastEl = document.getElementById('liveToast');
        if (toastEl && toastEl.querySelector('.toast-body').textContent.trim() !== '') {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>

</main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</html>