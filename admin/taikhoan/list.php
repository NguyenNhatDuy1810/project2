<?php
include "home.php";
?>
<div class="container">
    <div class="card">
        <div class="card-header text-center bg-primary text-white">
            <h1>DANH SÁCH TÀI KHOẢN</h1>
        </div>
        <div class="card-body">
            <form id="Taikhoanform" method="POST" action="index.php?act=deleteSelected10">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><input type="checkbox" id="checkAll"></th>
                                <th>MÃ TÀI KHOẢN</th>
                                <th>TÊN NGƯỜI DÙNG</th>
                                <th>TÊN ĐĂNG NHẬP</th>
                                <th>MẬT KHẨU</th>
                                <th>EMAIL</th>
                                <th>ĐỊA CHỈ</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>ROLE</th>
                                <th>HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($listtaikhoan) && !empty($listtaikhoan)) {
                                foreach ($listtaikhoan as $taikhoan) {
                                    extract($taikhoan);
                                    $suatk = "index.php?act=suatk&id=" . $id;
                                    $xoatk = "index.php?act=xoatk&id=" . $id;
                                    echo '<tr>
                                            <td><input type="checkbox" name="selected[]" value="'.$id.'"></td>
                                            <td>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $user . '</td>
                                            <td>' . $pass . '</td>
                                            <td>' . $email . '</td>
                                            <td>' . $address . '</td>
                                            <td>' . $tel . '</td>
                                            <td>' . $role . '</td>
                                            <td>
                                                <a href="' . $suatk . '" class="btn btn-sm btn-primary">Sửa</a>
                                                <a href="' . $xoatk . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')">Xóa</a>
                                            </td>
                                          </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="10" class="text-center">Không có dữ liệu trong danh mục</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-primary" onclick="selectAll()">Chọn tất cả</button>
                    <button type="button" class="btn btn-secondary" onclick="deselectAll()">Bỏ chọn tất cả</button>
                    <button type="button" class="btn btn-danger" onclick="deleteSelected10()">Xóa các mục đã chọn</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($thongbao) && $thongbao != ""): ?>
    <div class="container mt-3">
        <div class="alert alert-info text-center">
            <?php echo $thongbao; ?>
        </div>
    </div>
<?php endif; ?>

<script>
    // Chức năng check all qua checkbox ở header
    document.getElementById('checkAll').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="selected[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    function selectAll() {
        document.querySelectorAll('input[type="checkbox"][name="selected[]"]').forEach(checkbox => checkbox.checked = true);
    }

    function deselectAll() {
        document.querySelectorAll('input[type="checkbox"][name="selected[]"]').forEach(checkbox => checkbox.checked = false);
    }

    function deleteSelected10() {
        const selected = [];
        document.querySelectorAll('input[name="selected[]"]:checked').forEach(checkbox => {
            selected.push(checkbox.value);
        });
        if (selected.length > 0) {
            if (confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không?')) {
                document.getElementById('Taikhoanform').submit();
            }
        } else {
            alert('Vui lòng chọn ít nhất một mục để xóa.');
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

