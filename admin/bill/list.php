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
                                        <th>SỐ LƯỢNG ĐƠN HÀNG</th>
                                        <th>TỔNG TIỀN</th>
                                        <th>PHƯƠNG THỨC THANH TOÁN</th>
                                        <th>TRẠNG THÁI ĐƠN HÀNG</th>
                                        <th>NGÀY ĐẶT HÀNG</th>   
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listbill as $bill) {
                                        extract($bill);
                                        $kh = $bill["bill_name"] . '<br>' . $bill["bill_email"] . '<br>' . $bill["bill_address"] . '<br>' . $bill["bill_tel"];
                                        $ttdh = get_ttdh($bill["bill_status"]);
                                        // $pttt = get_pttt($bill["bill_pttt"]);
                                        $countsp = loadall_cart_count($bill["id"]);
                                        $deleteOrderUrl = "index.php?act=deleteOrder&id=" . $id;
                                        $editOrderUrl = "index.php?act=editOrder&id=" . $id;

                                        echo '<tr>
                                                <td><input type="checkbox" name="selected[]" value="' . $id . '"></td>
                                                <td>DH' . $bill['id'] . '</td>
                                                <td>' . $kh . '</td>
                                                <td>' . $countsp . '</td>
                                                <td>' . number_format($total,0,'.','.') . '</td>
                                               <td>Trực Tiếp</td>
                                                <td>' . $ttdh . '</td>
                                                <td>' . $ngaydathang . '</td>
                                                <td>
                                                    <a href="' . $editOrderUrl . '" class="btn btn-warning btn-sm">Sửa</a>
                                                    <a href="' . $deleteOrderUrl . '" class="btn btn-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>';
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
                                <a href="index.php?act=addsp" class="btn btn-success">Nhập thêm</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
