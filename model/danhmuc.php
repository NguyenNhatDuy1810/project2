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
?>