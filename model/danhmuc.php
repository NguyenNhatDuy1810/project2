<?php

function loading_danhmuc(){
    $sql="SELECT * FROM danhmuc order by id desc";
    $listdanhmuc =  pdo_query($sql);
    return $listdanhmuc;
}

function insert_danhmuc($tenloai){
    $sql="INSERT into danhmuc(name) values('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id){
    $sql="SELECT COUNT(*) From sanpham where iddm = ? ";
    $count=pdo_query_value($sql,$id);

    if ($count > 0) {
        return "Không thể xóa danh mục vì có chứa sản phẩm liên quan";
    }else {
        $sql="DELETE FROM danhmuc where id = ? ";
        pdo_execute($sql, $id);
        return "Xóa danh mục thành công";
    }
}

function load1_danhmuc($id) {
    $sql = "SELECT * FROM danhmuc WHERE id = " . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}


function update_danhmuc($id, $tenloai) {
    $sql = "UPDATE danhmuc SET name = :name where id = " . $id;
    return pdo_execute($sql);
}

?>