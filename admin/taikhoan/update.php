<?php
include "home.php";
?>
<?php
if(is_array($tk)){
    extract($tk);
}
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h1>Cập nhật khách hàng</h1>
            </div>
            <div class="frmcontent">
                <form action="index.php?act=update_taikhoan" method="post">
                    <div class="form-group mb-3">
                        <label for="id">Mã Tài Khoản</label>
                        <input type="text" id="id" class="form-control" name="id" value="<?= $id?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="name">Tên Người Dùng: </label>
                        <input type="text" id="name" class="form-control" name="name" value="<?= $name ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="pass">Mật Khẩu: </label>
                        <input type="password" id="pass" class="form-control" name="pass" value="<?=  $pass ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" id="email" class="form-control" name="email" value="<?=  $email ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="address">Địa Chỉ: </label>
                        <input type="text" id="address" class="form-control" name="address" value="<?= $address ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="tel">Số Điện Thoại: </label>
                        <input type="text" id="tel" class="form-control" name="tel" value="<?= $tel ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="role">Vai Trò: </label>
                        <input type="text" id="role" class="form-control" name="role" value="<?= $role ?>">
                    </div><br>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                        <input class="btn btn-secondary" type="reset" value="Nhập lại">
                        <a href="index.php?act=dskh"><input class="btn btn-success" type="button" value="Danh Sách"></a>
                    </div>
                    <?php
                    if(isset($thongbao) && ($thongbao != "")) {
                        echo '<div class="alert alert-info">' . $thongbao . '</div>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
