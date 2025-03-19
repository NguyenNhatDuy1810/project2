<?php
function insert_taikhoan($name, $email, $user, $pass) {
    
    $sql = "INSERT INTO taikhoan(name, email, user, pass) VALUES ('$name', '$email', '$user', '$pass')";
    pdo_execute($sql);
}

function username_exists($user) {
 
    $sql = "SELECT COUNT(*) AS count FROM taikhoan WHERE user = ?";
    return pdo_query_value($sql, $user) > 0;
}

function checkuserlogin($user, $pass) {
    $sql = "SELECT * FROM taikhoan WHERE user=? AND pass=?";
    return pdo_query_one($sql, $user, $pass);
}

function checkuser($user, $pass) {
    $sql = "SELECT * FROM taikhoan WHERE email=? AND pass=?";
    return pdo_query_one($sql, $user, $pass);
}
function checkemail($email) {
    $sql = "SELECT * FROM taikhoan WHERE email = '".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function updateUser($id, $name, $email, $address, $tel, $pass) {
    $sql = "UPDATE taikhoan SET name='$name', email='$email', address='$address', tel='$tel', pass='$pass' WHERE id=$id";
    return pdo_execute($sql);
}
function updateUseradmin($id, $name, $email, $address, $tel, $pass,$role) {
    $sql = "UPDATE taikhoan SET name='$name', email='$email', address='$address', tel='$tel', pass='$pass', role='$role' WHERE id=$id";
    return pdo_execute($sql);
}

function loadall_taikhoan(){
    $sql = "SELECT * FROM taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function delete_taikhoan($id) {
    $sql = "SELECT role FROM taikhoan WHERE id = ?";
    $role = pdo_query_value($sql, $id);

    if ($role == 1) {
        return "Không thể xóa tài khoản admin.";
    } else {
        $sql = "DELETE FROM taikhoan WHERE id = ?";
        pdo_execute($sql, $id);
        return "Xóa tài khoản thành công.";
    }
}


function load1_tk($id) {
    $sql = "SELECT * FROM taikhoan WHERE id = ?";
    return pdo_query_one($sql, $id);
}

function countuser(){
    $sql = "SELECT COUNT(*) as slnd FROM taikhoan";
    $result = pdo_query($sql); 

    if ($result && count($result) > 0) {
        echo $result[0]['slnd'];
    } else {
        echo "Chưa có người dùng"; 
    }
}
?>