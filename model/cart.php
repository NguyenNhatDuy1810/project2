<?php

function insertbill($iduser, $name, $address, $tel, $email, $ngaydathang, $totalPrice) {
    $sql = "INSERT INTO bills (iduser, bill_name, bill_address, bill_tel, bill_email, ngaydathang, total) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_return_lastInsertId($sql, $iduser, $name, $address, $tel, $email, $ngaydathang, $totalPrice);
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill) {
    $sql = "INSERT INTO cart(iduser, idpro, img, name, price, soluong, thanhtien, idbill) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute($sql, $iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill);
}

function loadall_cart($idbill) {
    $sql = "SELECT * FROM cart WHERE idbill =".$idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_bill($iduser) {
    $sql = "SELECT bills.id AS bill_id, bills.iduser, bills.bill_name, bills.bill_email, bills.bill_address, 
                   bills.bill_tel, bills.total, bills.bill_status, bills.ngaydathang,
                   cart.name AS product_name, cart.soluong 
            FROM bills 
            LEFT JOIN cart ON bills.id = cart.idbill";
    if( $iduser>0)
    $sql.="AND iduser=".$iduser;
    $sql.=" order by bills.id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadone_bill($id) {
    $sql = "SELECT * FROM bills WHERE id = $id";
    return pdo_query_one($sql);
}
function loadall_cart_count($idbill) {
    $sql = "SELECT COUNT(*) FROM cart WHERE idbill = $idbill";
    $result = pdo_query_one($sql);
    return $result['COUNT(*)'];
}
function get_ttdh($n) {
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đơn hàng đang được xử lý";
            break;
        case '2':
            $tt = "Đơn hàng đang giao tới bạn";
            break;
        case '3':
            $tt = "Giao hàng thành công";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

function get_pttt($n) {
    switch ($n) {
        case '0':
            $pt = "visa";
            break;
        case '1':
            $pt = "Master Card";
            break;
        case '2':
            $pt = "Paypal";
            break;
        case '3':
            $pt = "Thanh toán trực tiếp";
            break;
        default:
            $pt = "Thanh toán trực tiếp";
            break;
    }
    return $pt;
}
function delete_order($id) {
    $sql1 = "DELETE FROM cart WHERE idbill = ?";
    pdo_execute($sql1, $id);  // Xóa sản phẩm trong cart trước

    $sql2 = "DELETE FROM bills WHERE id = ?";
    pdo_execute($sql2, $id);   // Sau đó xóa đơn hàng
}

// Hàm lấy thông tin đơn hàng theo ID để sửa
function get_order_by_id($id) {
    $sql = "SELECT * FROM bills WHERE id = ?";
    return pdo_query_one($sql, $id);
}

// Hàm cập nhật thông tin đơn hàng
function update_order($id, $name, $email, $address, $tel, $total, $status) {
    $sql = "UPDATE bills SET bill_name = ?, bill_email = ?, bill_address = ?, bill_tel = ?, total = ?, bill_status = ? WHERE id = ?";
    pdo_execute($sql, $name, $email, $address, $tel, $total, $status, $id);
}

function tongdt() {
    $sql = "SELECT SUM(cart.thanhtien - sanpham.import_price) AS Loi_Nhuan
            FROM cart
            JOIN sanpham ON cart.name = sanpham.name"; 
    $result = pdo_query_one($sql);
    return $result['Loi_Nhuan'] ?? 0;
}

function doanhthuTheoNgay() {
    $sql = "SELECT 
    b.ngaydathang,
    COUNT(DISTINCT b.id) AS countdh, 
    SUM(c.thanhtien) AS doanhthu,     
    SUM(c.thanhtien - s.import_price * c.soluong) AS loi_nhuan 
FROM bills b
JOIN cart c ON b.id = c.idbill
JOIN sanpham s ON c.idpro = s.id
GROUP BY b.ngaydathang
ORDER BY b.ngaydathang DESC;";
    return pdo_query($sql); // Trả về danh sách nhiều dòng
}
function timKiemDonHangTheoNgay($ngay) {
    $sql = "SELECT 
                b.ngaydathang, 
                COUNT(DISTINCT b.id) AS countdh, 
                SUM(c.thanhtien) AS doanhthu,     
                SUM(c.thanhtien - s.import_price * c.soluong) AS loi_nhuan 
            FROM bills b
            JOIN cart c ON b.id = c.idbill
            JOIN sanpham s ON c.idpro = s.id
            WHERE TRIM(b.ngaydathang) = ?
            GROUP BY b.ngaydathang
            ORDER BY b.ngaydathang DESC";
    
    return pdo_query($sql, $ngay);
}

?>