

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">SỬA ĐƠN HÀNG</h1>
            <form method="POST" action="index.php?act=updateOrder">
                <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                <div class="mb-3">
                    <label for="bill_name" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" id="bill_name" name="bill_name" value="<?php echo $order['bill_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="bill_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="bill_email" name="bill_email" value="<?php echo $order['bill_email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="bill_address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="bill_address" name="bill_address" value="<?php echo $order['bill_address']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="bill_tel" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="bill_tel" name="bill_tel" value="<?php echo $order['bill_tel']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Tổng tiền</label>
                    <input type="text" class="form-control" id="total" name="total" value="<?php echo $order['total']; ?>" required>
                </div>
               
                <div class="mb-3">
                    <label for="bill_status" class="form-label">Trạng thái</label>
                    <input type="text" class="form-control" id="bill_status" name="bill_status" value="<?php echo $order['bill_status']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="index.php?act=listbill" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
</div>

<?php
