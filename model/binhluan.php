<?php

function insert_binhluan($id, $idpro, $name, $email, $comment, $created_at){
    $sql="INSERT into binhluan(id,idpro,name,email,comment,created_at) values('$id','$idpro','$name','$email','$comment','$created_at')";
    pdo_execute($sql);
}

function loading_binhluan($idpro){
    $sql = "SELECT * FROM binhluan WHERE 1";
    if($idpro > 0) {
        $sql .= " AND idpro = '" . $idpro . "'";
    }
    $sql .= " ORDER BY id DESC";

    $listbl = pdo_query($sql);
    return $listbl;
}

function delete_bl($id) {
    $sql = "DELETE FROM binhluan WHERE id = ?";
    pdo_execute($sql, $id);
}

?>