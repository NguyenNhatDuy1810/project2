<main class="main-content">
  <!-- Nên để link CSS trong phần <head> của trang, dưới đây chỉ để thử nghiệm -->
  <!-- PHẦN SLIDE BANNER CHÍNH -->
  <section class="w3l-main-slider banner-slider" id="home">
    <div class="owl-one owl-carousel owl-theme">
      <div class="item">
        <div class="slider-info banner-view banner-top1">
          <div class="container">
            <div class="banner-info">
              <h3>CHILLIES <span> STORE </span></h3>
              <div class="banner-info-top">
                <p>Chúng tôi hân hạnh khi được bạn ghé thăm!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Thêm slide khác nếu muốn -->
    </div>
  </section>  
  <!-- KẾT THÚC SLIDE BANNER -->

  <!-- BEST SELLING PRODUCTS -->
  <section class="collection" id="best-selling">
    <div class="collection-header">
      <h1><span class="line">|</span> BEST SELLING PRODUCTS</h1>
      <nav>
        <?php
          foreach ($dsdm as $dm) {
          extract($dm);
          echo '<a href="index.php?act=sanpham&iddm='.$id.'">'.$name.'</a>';
          }
        ?>
        <a href="https://www.facebook.com/emdii181004">Fanpage</a>
        <button onclick="window.location.href='index.php?act=return'">XEM TẤT CẢ</button>
      </nav>
    </div>
    <div class="row mt-4">
      <div class="product-slider">
        <?php foreach ($dst10 as $sp): ?>
          <?php 
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $img = $img_path . $img;
            $price = ($discount > 0) ? $price * (1 - $discount / 100) : $price;
          ?>
          <div class="product-item">
            <div class="product">
              <a href="<?= $linksp; ?>" class="offer-img">
                <img src="<?= $img; ?>" class="img-responsive product-img" alt="Không có ảnh minh họa">
              </a>
              
              <div class="add">
                <form action="index.php?act=addcart" method="post">
                  <input type="hidden" name="id" value="<?= $id; ?>">
                  <input type="hidden" name="name" value="<?= $name; ?>">
                  <input type="hidden" name="img" value="<?= $img; ?>">
                  <input type="hidden" name="price" value="<?= $price ?>">
                  <button type="submit" name="addcart" class="select-btn">Thêm vào giỏ hàng</button>
                </form>
              </div>
              <h6><a href="<?= $linksp; ?>"><?= $name; ?></a></h6>
              <div><h7>Lượt xem: <?= $sp['view'] ?></h7></div>
              <p>
                <?php if ($discount > 0): ?>
                  <del class="text-muted"><?= number_format($price / (1 - $discount / 100)); ?> VNĐ</del>
                  <strong class="text-danger"> <?= number_format($price); ?> VNĐ</strong>
                  <span class="badge bg-success">-<?= $discount; ?>%</span>
                <?php else: ?>
                  <strong><?= number_format($price); ?> VNĐ</strong>
                <?php endif; ?>
              </p>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- KẾT THÚC BEST SELLING PRODUCTS -->

  <!-- BIG SALE PRODUCTS -->
  <section class="collection" id="big-sale">
    <div class="collection-header">
      <h1><span class="line">|</span> BIG SALE</h1>
      <nav>
      <?php
          foreach ($dsdm as $dm) {
          extract($dm);
          echo '<a href="index.php?act=sanpham&iddm='.$id.'">'.$name.'</a>';
          }
        ?>
        <a href="https://www.facebook.com/emdii181004">Fanpage</a>
        <button onclick="window.location.href='index.php?act=return'">XEM TẤT CẢ</button>
      </nav>
    </div>
    <div class="row mt-4">
      <div class="product-slider">
      <?php foreach ($dstbigsale as $sp): ?>
          <?php 
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $img = $img_path . $img;
            
        
            $price = ($discount > 0) ? $price * (1 - $discount / 100) : $price;
          ?>
          <div class="product-item">
            <div class="product">
              <a href="<?= $linksp; ?>" class="offer-img">
                <img src="<?= $img; ?>" class="img-responsive product-img" alt="Không có ảnh minh họa">
              </a>
              <div class="add">
                <form action="index.php?act=addcart" method="post">
                  <input type="hidden" name="id" value="<?= $id; ?>">
                  <input type="hidden" name="name" value="<?= $name; ?>">
                  <input type="hidden" name="img" value="<?= $img; ?>">
                  <input type="hidden" name="price" value="<?= $price; ?>">
                  <button type="submit" name="addcart" class="select-btn">Thêm vào giỏ hàng</button>
                </form>
              </div>
              <h6><a href="<?= $linksp; ?>"><?= $name; ?></a></h6>
              <div><h7>Lượt xem: <?= $sp['view'] ?></h7></div>
              
              <!-- Hiển thị giá -->
              <p>
                <?php if ($discount > 0): ?>
                  <del class="text-muted"><?= number_format($price / (1 - $discount / 100)); ?> VNĐ</del>
                  <strong class="text-danger"> <?= number_format($price); ?> VNĐ</strong>
                  <span class="badge bg-success">-<?= $discount; ?>%</span>
                <?php else: ?>
                  <strong><?= number_format($price); ?> VNĐ</strong>
                <?php endif; ?>
              </p>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- KẾT THÚC BIG SALE PRODUCTS -->

  <!-- NEW PRODUCTS -->
  <section class="collection" id="new-product">
    <div class="collection-header">
      <h1><span class="line">|</span> ALL PRODUCTS</h1>
      <nav>
      <?php
          foreach ($dsdm as $dm) {
          extract($dm);
          echo '<a href="index.php?act=sanpham&iddm='.$id.'">'.$name.'</a>';
          }
        ?>
        <a href="https://www.facebook.com/emdii181004">Fanpage</a>
        <button onclick="window.location.href='index.php?act=return'">XEM TẤT CẢ</button>
      </nav>
    </div>
    <div class="row mt-4">
      <div class="product-slider">
        <?php foreach ($spnew as $sp): ?>
          <?php 
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $img = $img_path . $img;
            $price = ($discount > 0) ? $price * (1 - $discount / 100) : $price;
          ?>
          <div class="product-item">
            <div class="product">
              <a href="<?= $linksp; ?>" class="offer-img">
                <img src="<?= $img; ?>" class="img-responsive product-img" alt="Không có ảnh minh họa">
              </a>
              <div class="add">
                <form action="index.php?act=addcart" method="post">
                  <input type="hidden" name="id" value="<?= $id; ?>">
                  <input type="hidden" name="name" value="<?= $name; ?>">
                  <input type="hidden" name="img" value="<?= $img; ?>">
                  <input type="hidden" name="price" value="<?= $price; ?>">
                  <button type="submit" name="addcart" class="select-btn">Thêm vào giỏ hàng</button>
                </form>
              </div>
              <h6><a href="<?= $linksp; ?>"><?= $name; ?></a></h6>
              <div ><h7>Lượt xem: <?= $sp['view'] ?></h7></div>
              <p>
                <?php if ($discount > 0): ?>
                  <del class="text-muted"><?= number_format($price / (1 - $discount / 100)); ?> VNĐ</del>
                  <strong class="text-danger"> <?= number_format($price); ?> VNĐ</strong>
                  <span class="badge bg-success">-<?= $discount; ?>%</span>
                <?php else: ?>
                  <strong><?= number_format($price); ?> VNĐ</strong>
                <?php endif; ?>
              </p>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- KẾT THÚC NEW PRODUCTS -->
 <?php
    include "./slide.php";
?>

</main>
