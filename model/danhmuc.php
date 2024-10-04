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

function load1_danhmuc($iddm) {
    $sql = "SELECT * FROM danhmuc WHERE id = " . intval($iddm);
    $iddm = pdo_query_one($sql);
    return $iddm;
}


function update_danhmuc($id,$tenloai){
    $sql="UPDATE danhmuc SET  name= :name WHERE id= :$id";
    pdo_execute($sql);
}
?>