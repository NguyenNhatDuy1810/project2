
    // Chức năng thay đổi ảnh chính khi nhấn vào ảnh nhỏ
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".thumbs img").forEach(img => {
            img.addEventListener("click", function () {
                document.querySelector(".main-img").src = this.src;
            });
        });
    });
    

    // Chức năng tăng/giảm số lượng sản phẩm
    document.querySelectorAll(".options button").forEach(button => {
        button.addEventListener("click", function () {
            let input = document.querySelector(".qty-input");
            let currentValue = parseInt(input.value);
            if (this.textContent === "+" && currentValue < 99) {
                input.value = currentValue + 1;
            } else if (this.textContent === "-" && currentValue > 1) {
                input.value = currentValue - 1;
            }
        });
    });
    // Chức năng chọn kích thước
    document.querySelectorAll(".options p:nth-child(2) button").forEach(btn => {
        btn.addEventListener("click", function () {
            document.querySelectorAll(".options p:nth-child(2) button").forEach(b => b.classList.remove("active"));
            this.classList.add("active");
        });
    });
    


   
//   <!-- SCRIPT KHAI BÁO SLICK SLIDER -->

  $(document).ready(function(){
    var slider = $('.product-slider');
    slider.slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: { slidesToShow: 3 }
        },
        {
          breakpoint: 768,
          settings: { slidesToShow: 2 }
        },
        {
          breakpoint: 480,
          settings: { slidesToShow: 1 }
        }
      ]
    }); 
  });
  $(document).ready(function() {
    function updateCartCount() {
        $.ajax({
            url: "cart_count.php",
            method: "GET",
            success: function(response) {
                $("#cart-count").text(response);
            }
        });
    }

    updateCartCount(); // Cập nhật khi tải trang
});