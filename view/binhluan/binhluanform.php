<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";

if (isset($_POST['idpro'])) {
    $idpro = $_POST['idpro'];
    $_SESSION['idpro'] = $idpro;
} elseif (isset($_SESSION['idpro'])) {
    $idpro = $_SESSION['idpro'];
} else {
    die("Lỗi: Không tìm thấy sản phẩm.");
}

// Load bình luận từ DB
$dsbl = loading_binhluan($idpro);
?>

<div class="container mt-4">
    <h4 class="mb-3">Bình Luận</h4>
    <div id="comment-list">
        <?php if (!empty($dsbl)): ?>
            <?php foreach ($dsbl as $bl): ?>
                <div class="comment p-3 border rounded mb-2">
                    <strong><?= htmlspecialchars($bl['name']) ?></strong>
                    <small class="text-muted">(<?= $bl['created_at'] ?>)</small>
                    <p><?= nl2br(htmlspecialchars($bl['comment'])) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Chưa có bình luận nào.</p>
        <?php endif; ?>
    </div>

    <form id="comment-form" class="mt-3">
        <input type="hidden" name="idpro" value="<?= htmlspecialchars($idpro); ?>">
        <div class="mb-2">
            <label class="form-label">Tên:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Bình luận:</label>
            <textarea class="form-control" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#comment-form").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "view/binhluan/submit_comment.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#comment-list").prepend(response); // Thêm bình luận mới vào danh sách
                $("#comment-form")[0].reset(); // Xóa dữ liệu nhập
            }
        });
    });
});
</script>
