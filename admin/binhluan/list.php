<?php
include "home.php";
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="row mb-4">
                <h1 class="text-center">DANH SÁCH BÌNH LUẬN</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <form id="danhmucForm" method="POST" action="index.php?act=dsbl">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                       
                                        <th>TÊN NGƯỜI DÙNG</th>
                                        <th>NỘI DUNG</th>
                                        <th>EMAIL</th>
                                       
                                        <th>NGÀY BÌNH LUẬN</th>   
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($listbl) && !empty($listbl)) {
                                        foreach ($listbl as $bl) {
                                            extract($bl);
                                            
                                            $xoabl = "index.php?act=xoabl&id=" . $id;
                                            echo '<tr>
                                                    <td><input type="checkbox" name="selected[]" value="'.$id.'"></td>
                                                    <td>' . $id . '</td>
                                                   
                                                     <td>' . $name . '</td>
                                                    <td>' . $comment . '</td>
                                                     <td>' . $email . '</td>
                                                    <td>' . $created_at . '</td>
                                                    
                                                    <td>
                                                        
                                                        <a href="' . $xoabl . '" class="btn btn-danger btn-sm">Xóa</a>
                                                    </td>
                                                  </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="4" class="text-center">Không có dữ liệu trong danh mục</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button type="button" class="btn btn-primary" onclick="selectAll()">Chọn tất cả</button>
                            <button type="button" class="btn btn-secondary" onclick="deselectAll()">Bỏ chọn tất cả</button>
                            <button type="button" class="btn btn-danger" onclick="deleteSelected()">Xóa các mục đã chọn</button>
                            
                        </div>
                    </form>
                </div>
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

<?php if (isset($thongbao) && $thongbao != ""): ?>
    <div class="alert alert-info">
        <?php echo $thongbao; ?>
    </div>
<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
