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

function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql="INSERT into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
{
    $sql = "UPDATE sanpham SET iddm='$iddm', name='$tensp', price='$giasp', mota='$mota'";
    if (!empty($hinh)) {
        $sql .= ", img='$hinh'";
    }
    $sql .= " WHERE id=$id";
    pdo_execute($sql);
}


?>