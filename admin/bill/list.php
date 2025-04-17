<?php
include "home.php";
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="row mb-4">
                <h1 class="text-center">DANH SÁCH ĐƠN HÀNG</h1>
            </div>
            <div class="row">
                <div class="c">
                    <form id="danhmucForm" method="POST" action="index.php?act=deleteSelectedOrders">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>THÔNG TIN KHÁCH HÀNG</th>
                                        <th>TÊN ĐƠN HÀNG</th> <!-- Hiển thị tên sản phẩm -->
                                        
                                        <th>TỔNG TIỀN</th>
                                        <th>PHƯƠNG THỨC THANH TOÁN</th>
                                        <th>TRẠNG THÁI ĐƠN HÀNG</th>
                                        <th>NGÀY ĐẶT HÀNG</th>   
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$last_bill_id = null; // Biến lưu bill_id của dòng trước

foreach ($listbill as $bill) {
    extract($bill);
    $kh = $bill["bill_name"] . '<br>' . $bill["bill_email"] . '<br>' . $bill["bill_address"] . '<br>' . $bill["bill_tel"];
    $ttdh = get_ttdh($bill["bill_status"]);

    // Nếu idbill trùng với dòng trước thì không hiển thị lại thông tin đơn hàng
    if ($bill_id !== $last_bill_id) {
        echo '<tr>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '"><input type="checkbox" name="selected[]" value="' . $bill_id . '"></td>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '">DH' . $bill_id . '</td>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '">' . $kh . '</td>
                <td>' . $bill["product_name"] . ' (' . $bill["soluong"] . ' cái)</td>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '">' . number_format($total, 0, '.', '.') . '</td>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '">Trực Tiếp</td>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '">' . $ttdh . '</td>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '">' . $ngaydathang . '</td>
                <td rowspan="' . count(array_filter($listbill, fn($b) => $b["bill_id"] == $bill_id)) . '">
                    <a href="index.php?act=editOrder&id=' . $bill_id . '" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="index.php?act=deleteOrder&id=' . $bill_id . '" class="btn btn-danger btn-sm">Xóa</a>
                </td>
              </tr>';
    } else {
        // Hiển thị dòng chỉ chứa sản phẩm
        echo '<tr>
                <td>' . $bill["product_name"] . ' (' . $bill["soluong"] . ' cái)</td>
              </tr>';
    }

    $last_bill_id = $bill_id;
}
?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast thông báo -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
