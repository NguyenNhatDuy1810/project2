<?php
include "home.php";
?>
<div class="container">
    <div class="col-12">
        <div class="row mb-4">
            <h1 class="text-center">THỐNG KÊ DOANH THU</h1>
        </div>

        <!-- Form tìm kiếm theo ngày -->
        <div class="row mb-3">
            <div class="col-md-6 offset-md-3">
            <form method="POST" action="index.php?act=tdt">
    <input type="text" name="search_date" class="form-control" placeholder="Nhập ngày (DD/MM/YYYY)" required>
    <button type="submit" class="btn btn-primary mt-2">Tìm kiếm</button>
</form>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>NGÀY</th>
                            <th>SỐ ĐƠN HÀNG</th>
                            <th>DOANH THU</th>
                            <th>LỢI NHUẬN</th>
                        </tr>
                        <tbody>
                            <?php
                            if (!empty($listdoanhthu)) {
                                $i = 1;
                                foreach ($listdoanhthu as $dt) {
                                    $ngay = $dt['ngaydathang'] ?? 'Không xác định';
                                    $countdh = $dt['countdh'] ?? 0;
                                    $doanhthu = $dt['doanhthu'] ?? 0;
                                    $loinhuan = $dt['loi_nhuan'] ?? 0;
                                    echo "<tr>
                                            <td>$i</td>
                                            <td>$ngay</td>
                                            <td>$countdh</td>
                                            <td>".number_format($doanhthu, 0, ',', '.')." VNĐ</td>
                                            <td>".number_format($loinhuan, 0, ',', '.')." VNĐ</td>
                                          </tr>";
                                    $i++;
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu doanh thu</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= isset($thongbao) ? $thongbao : ''; ?>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
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