<div class="container">
    <div class="col-12">
        <div class="row mb-4">
            <h1 class="text-center">DANH SÁCH DANH LOẠI HÀNG</h1>
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
                                                <a href="'.$suadm.'" class="btn btn-primary btn-sm">Sửa</a>
                                                <a href="'.$xoadm.'" class="btn btn-primary btn-sm">Xóa</a>
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
                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-primary" onclick="selectALL()">Chọn Tất Cả</button>
                        <button type="button" class="btn btn-primary" onclick="deselectALL()">Bỏ Chọn Tất Cả</button>
                        <button type="button" class="btn btn-primary" onclick="deleteselectALL()">Xóa Các Mục Đã Chọn</button>
                        <a href="index.php?act=adddm" class="btn btn-primary">Nhập Thêm</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function selectAll() {
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = true);
    }

    function deselectAll() {
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
    }

    function deleteSelected() {
        const selected = [];
        document.querySelectorAll('input[name="selected[]"]:checked').forEach(checkbox => {
            selected.push(checkbox.value);
        });
        if (selected.length > 0) {
            if (confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không?')) {
                document.getElementById('danhmucForm').submit();
            }
        } else {
            alert('Vui lòng chọn ít nhất một mục để xóa.');
        }
    }
</script>
<?php if (isset($thongbao) && $thongbao !=""): ?>
    <div class="alert alert-info">
        <?php echo $thongbao; ?>
    </div>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>