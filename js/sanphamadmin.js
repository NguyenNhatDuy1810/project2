function selectAll() {
    const checkboxes = document.querySelectorAll('input[name="selected[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = true);
}

function deselectAll() {
    const checkboxes = document.querySelectorAll('input[name="selected[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = false);
}

function deleteSelected1() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục đã chọn không?")) {
        document.getElementById("sanphamForm").submit();
    }
}