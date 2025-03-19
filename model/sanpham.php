<?php

function countsp() {
    $sql = "SELECT COUNT(*) as slsp FROM sanpham";
    $result = pdo_query($sql); 

    if ($result && count($result) > 0) {
        echo $result[0]['slsp'];
    } else {
        echo "Chưa có sản phẩm"; 
    }
}

function loading_sanpham($kyw,$iddm){
    $sql = "SELECT * FROM sanpham where 1";
    if ($kyw!="") {
        $sql.=" and name like '%".$kyw."%'";
    }
    if ($iddm>0) {
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql .=" order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load1_sanpham($id) {
    $sql = "SELECT * FROM sanpham WHERE id=" . $id;
    return pdo_query_one($sql);
}

function viewsp($id) {
    $sql = "UPDATE sanpham SET view = view + 1 WHERE id = ?";
    pdo_execute($sql, $id);
}
function countViewAll() {
    $sql = "SELECT SUM(view) AS total_view FROM sanpham";
    $result = pdo_query_one($sql); // Lấy một dòng kết quả
    return $result['total_view'] ?? 0; // Nếu không có dữ liệu thì trả về 0
}

function insert_sanpham($tensp,$gianhapsp,$giasp,$hinh,$mota,$quantity, $iddm){
    $sql="INSERT into sanpham(name,import_price,price,img,mota,quantity,iddm) values('$tensp','$gianhapsp','$giasp','$hinh','$mota','$quantity','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id) {
    $sql = "DELETE FROM sanpham WHERE id = ?";
    $conn = pdo_get_connection(); // Giả sử bạn có một hàm để lấy kết nối PDO
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$id])) {
        return true;
    } else {
        return false;
    }
}

function update_sanpham($id, $iddm, $tensp,$import_price, $giasp, $quantity, $mota, $hinh,$discount)
{
    $sql = "UPDATE sanpham SET iddm='$iddm', name='$tensp',import_price='$import_price', price='$giasp',quantity='$quantity', mota='$mota',discount='$discount'";
    if (!empty($hinh)) {
        $sql .= ", img='$hinh'";
    }
    $sql .= " WHERE id=$id";
    pdo_execute($sql);
}

function load_sanpham_cungloai($id, $iddm) {
    $sql = "SELECT * FROM sanpham WHERE iddm=" . $iddm . " AND id != " . $id; // Lấy sản phẩm khác id nhưng cùng danh mục
    return pdo_query($sql);
}

function load1_sanpham_top10() {
    $sql = "SELECT * FROM sanpham ORDER BY view DESC LIMIT 0, 10";
    return pdo_query($sql);
}
function load1_sanpham_giamgia() {
    $sql = "SELECT *, price * (1 - discount / 100) AS price_discounted FROM sanpham WHERE discount > 0";
    return pdo_query($sql);
}

function load1_sanpham_home() {
    $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 0, 12";
    return pdo_query($sql);
}


function load1_tendanhmuc($iddm) {
    if ($iddm>0) {
        $sql = "SELECT * FROM danhmuc WHERE id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }else {
        return "";
    }
   
}

?>