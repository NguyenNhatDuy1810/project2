<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($onesp) && is_array($onesp)) {
                extract($onesp);
                $img = $img_path . $img;
                $price = ($discount > 0) ? $price * (1 - $discount / 100) : $price;
                $status = ($quantity > 0) ? '<span class="text-success">Còn hàng: '.$quantity.'</span>' : '<span class="text-danger">Hết hàng</span>';
            } else {
                echo '<h4 class="text-center text-danger">Dữ liệu sản phẩm không tồn tại</h4>';
                return;
            }
            ?>

            <!-- Chi tiết sản phẩm -->
            <section class="product-detail py-4">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= $img ?>" alt="<?= $name ?>" class="img-fluid rounded shadow-sm">
                    </div>
                    <div class="col-md-6">
                        <h2><?= $name ?></h2>
                        <p><strong>Mã sản phẩm:</strong> CS<?= $id ?></p>
                        <p><strong>Thương hiệu:</strong> Chillies Store</p>
                        <p><strong>Trạng thái:</strong> <?= $status ?></p>
                        <p class="price text-danger font-weight-bold"><?= number_format($price) ?>₫</p>

                        <div class="options mb-3">
                            <p><strong>Số lượng:</strong></p>
                            <?php if ($quantity > 0): ?>
                                <div class="input-group" style="max-width: 150px;">
                                    <button class="btn btn-outline-secondary qty-btn">-</button>
                                    <input type="number" value="1" min="1" max="<?= $quantity ?>" class="form-control text-center qty-input">
                                    <button class="btn btn-outline-secondary qty-btn">+</button>
                                </div>
                            <?php else: ?>
                                <p class="text-danger">Sản phẩm đã hết hàng</p>
                            <?php endif; ?>
                        </div>

                        <form action="index.php?act=addcart" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="img" value="<?= $img ?>">
                            <input type="hidden" name="price" value="<?= $price ?>">
                            <?php if ($quantity > 0): ?>
                                <button type="submit" name="addcart" class="btn btn-dark">THÊM VÀO GIỎ</button>
                                <button type="submit" name="buynow" class="btn btn-warning">MUA NGAY</button>
                            <?php else: ?>
                                <button class="btn btn-secondary" disabled>Hết hàng</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Mô tả sản phẩm -->
            <section class="product-description py-4">
                <h3>Mô tả sản phẩm</h3>
                <p><?= $mota ?></p>
            </section>
            
           <!-- Phần bình luận -->
            <section class="product-comments py-4">
                
                <div id="comment-section" class="border rounded p-3 shadow-sm">
                    <div class="text-center py-3">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Đang tải bình luận...</span>
                        </div>
                    </div>
                </div>
            </section>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    // Load bình luận bằng AJAX
                    $("#comment-section").load("view/binhluan/binhluanform.php", { idpro: <?= $id ?> });
                });
            </script>
        
            <!-- Sản phẩm cùng loại -->
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
            <div class="row  mt-4">
                <div class="product-slider">
                    <?php if (isset($spcungloai) && is_array($spcungloai)): ?>
                        <?php foreach ($spcungloai as $item): ?>
                            <?php extract($item); ?>
                            <?php $img = $img_path . $img;?>
                            <?php  $linksp = "index.php?act=sanphamct&idsp=".$id; ?>
                            <div class="product-item">
                                <div class="product">
                                        <a href="<?= $linksp; ?>" class="offer-img">
                                            <img src="<?= $img; ?>" class="card-responsive product-img" alt="Không có ảnh minh họa">
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
                            <div><h7>Lượt xem: <?= $view ?></h7></div>
                            <p>
                                <?php if ($discount > 0): ?>
                                <del class="text-muted"><?= number_format($price); ?> VNĐ</del>
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
                        <p class="text-muted">Không có sản phẩm nào cùng loại.</p>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
</div>
 