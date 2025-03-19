<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idpro = $_POST['idpro'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    $created_at = date('Y-m-d H:i:s');

    if (!empty($name) && !empty($email) && !empty($comment)) {
        insert_binhluan(null, $idpro, $name, $email, $comment, $created_at);

        // Trả về HTML để hiển thị bình luận mới
        echo '<div class="comment p-3 border rounded mb-2">';
        echo '<strong>' . htmlspecialchars($name) . '</strong>';
        echo '<small class="text-muted"> (' . $created_at . ')</small>';
        echo '<p>' . nl2br(htmlspecialchars($comment)) . '</p>';
        echo '</div>';
    }
}
?>
