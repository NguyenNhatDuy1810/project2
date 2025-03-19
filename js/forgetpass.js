document.addEventListener("DOMContentLoaded", function () {
    let popup = document.getElementById("popup-thongbao");
    let closePopup = document.getElementById("close-popup");

    if (popup) {
        popup.style.display = "flex"; // Hiển thị popup

        // Tự động ẩn sau 3 giây
        setTimeout(function () {
            popup.style.display = "none";
        }, 3000);

        // Đóng khi bấm vào nút "×"
        closePopup.addEventListener("click", function () {
            popup.style.display = "none";
        });

        // Đóng khi bấm ra ngoài
        popup.addEventListener("click", function (e) {
            if (e.target === popup) {
                popup.style.display = "none";
            }
        });
    }
});