<section class="collection">
    <div class="collection-header">
        <h1><span class="line">|</span> 
            <?php 
                if (!empty($kyw)) { 
                    echo "Tất cả sản phẩm: $kyw"; 
                } elseif (!empty($tendanhmuc)) { 
                    echo "Tất cả sản phẩm: $tendanhmuc"; 
                } else { 
                    echo "Tất cả sản phẩm";
                }
            ?>
        </h1>
        <nav>
            <?php foreach ($dsdm as $dm): ?>
                <a href="index.php?act=sanpham&iddm=<?= $dm['id'] ?>"><?= $dm['name'] ?></a>
            <?php endforeach; ?>
            <a href="https://www.facebook.com/emdii181004">Fanpage</a>
            <button onclick="window.location.href='index.php?act=return'">XEM TẤT CẢ</button>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="product-slider">
            <?php if (!empty($dssp)): ?>
                <?php foreach ($dssp as $sp): ?>
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
                            <div><h7>Lượt xem: <?= $view?></h7></div>
                            <p>
                                <?php if ($discount > 0): ?>
                                <del class="text-muted"><?= number_format($price/ (1 - $discount / 100)); ?> VNĐ</del>
                                <strong class="text-danger"> <?= number_format($price); ?> VNĐ</strong>
                                <span class="badge bg-success">-<?= $discount; ?>%</span>
                                <?php else: ?>
                                <strong><?= number_format($price); ?> VNĐ</strong>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3 class="text-center text-muted">Không có sản phẩm nào</h3>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
    include "./slide.php";
?>
