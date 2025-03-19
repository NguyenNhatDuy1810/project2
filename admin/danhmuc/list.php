<?php
include "home.php";
?>
<div class="container">
    <div class="col-12">
        <div class="row mb-4">
            <h1 class="text-center">DANH SÁCH LOẠI HÀNG</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <form id="danhmucForm" method="POST" action="index.php?act=">
                    <div class="table-responsive">
                    <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Mã Loại</th>
                                    <th>Tên Loại</th>
                                    <th>Ghi Chú</th>
                                </tr>                       
                            <tbody>
                                <?php
                                if (isset($listdanhmuc) && !empty($listdanhmuc)) {
                                    foreach ($listdanhmuc as $danhmuc) {
                                        extract($danhmuc);
                                        $suadm="index.php?act=suadm&id=".$id;
                                        $xoadm="index.php?act=xoadm&id=".$id;
                                        echo 
                                        '<tr>
                                            <td><input type="checkbox" name="selected[]" value="'.$id.'"></td>
                                            <td>'.$id.'</td>
                                            <td>'.$name.'</td>
                                            <td>
                                                <a href="'.$suadm.'" class="btn btn-outline-success btn-sm">Sửa</a>
                                                <a href="'.$xoadm.'" class="btn btn-outline-danger btn-sm">Xóa</a>
                                            </td>
                                        </tr>';
                                    }
                                }else {
                                    '<tr><td colspan="4" class="text-center">Không có dữ liệu trong danh mục</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-between">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary" onclick="selectAll()">Chọn tất cả</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary" onclick="deselectAll()">Bỏ chọn tất cả</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-danger" onclick="deleteSelected1()">Xóa các mục đã Chọn</button>
                            </div>
                            <div>
                                <a href="index.php?act=adddm" class="btn btn-success">Nhập thêm</a>
                            </div>
                        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>

