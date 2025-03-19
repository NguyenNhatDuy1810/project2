function selectAll() {
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = true);
}

function deselectAll() {
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
}

function deleteSelected() {
    const selected = [];
    document.querySelectorAll('input[name="selected[]"]:checked').forEach(checkbox => {
        selected.push(checkbox.value);
    });
    if (selected.length > 0) {
        if (confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không?')) {
            document.getElementById('danhmucForm').submit();
        }
    } else {
        alert('Vui lòng chọn ít nhất một mục để xóa.');
    }
}