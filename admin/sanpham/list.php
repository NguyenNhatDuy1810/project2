<?php
include "home.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row frmtitle mb-4">
                <h1 class="text-center">DANH SÁCH SẢN PHẨM</h1>
            </div>
            <div class="row frmcontent mb-3">
                <form action="index.php?act=listsp" method="post" class="d-flex align-items-center">
                    <input type="text" name="kyw" class="form-control me-2" placeholder="Tìm kiếm...">
                    <select name="iddm" id="iddm" class="form-select me-2">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            echo '<option value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>';
                        }
                        ?>
                    </select>
                    <input class="btn btn-outline-success"  type="submit" name="listok" value="Tìm">
                </form>
            </div>
            <form id="sanphamForm" method="POST" action="index.php?act=deleteSelected1">
                <div class="row frmcontent">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>MÃ SẢN PHẨM</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th>GIÁ NHẬP SẢN PHẨM</th>
                                        <th>GIÁ SẢN PHẨM</th>
                                        <th>GIẢM GIÁ(%)</th>
                                        <th>HÌNH ẢNH</th>
                                        <th>MÔ TẢ</th>
                                        <th>LƯỢT XEM</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($listsanpham) && !empty($listsanpham)) {
                                        foreach ($listsanpham as $sanpham) {
                                            extract($sanpham);
                                            $suasp = "index.php?act=suasp&id=".$id;
                                            $xoasp = "index.php?act=xoasp&id=".$id;
                                            $hinh="../images/".$img;
                                            if (is_file($hinh)) {
                                                $hinh="<img src='".$hinh."' height='80'>";
                                            } else {
                                                $hinh="không có ảnh minh họa";
                                            }
                                                if (isset($discount)&&$discount!=0) {
                                                    $price=$price*(1-$discount/100);
                                                }else {
                                                    $price;
                                                }
                                            echo '<tr>
                                                    <td><input type="checkbox" name="selected[]" value="'.$id.'"></td>
                                                    <td>'.$id.'</td>
                                                    <td>'.$name.'</td>
                                                    <td>'.number_format($import_price,0).'</td>
                                                    <td>'.number_format($price,0).'</td>
                                                    <td>'.number_format($discount,0).'%</td> 
                                                    <td>'.$hinh.'</td>
                                                    <td>'.$mota.'</td>
                                                    <td>'.number_format($view,0,'.','.').'</td>
                                                    <td>'.$quantity.'</td>
                                                    <td>
                                                        <a href="'.$suasp.'" class="btn btn-primary btn-sm">Sửa</a>
                                                        <a href="'.$xoasp.'" class="btn btn-danger btn-sm">Xóa</a>
                                                    </td>
                                                </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="8">Không có dữ liệu trong danh sách sản phẩm</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
                            <div >
                                <a href="index.php?act=addsp" class="btn btn-success">Nhập thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
