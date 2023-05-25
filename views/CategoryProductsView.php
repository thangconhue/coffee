<?php
  $this->fileLayout = "TrangTrong.php";
 ?>
<section class="banner" id="banner">
    <?php foreach($a as $b): ?>
        <?php
            if(isset($b->photo) ? $b->photo : ""): ?>
                <img src="assets/upload/products/<?php echo $b->photo; ?>" class="img-responsive">
            <?php endif; ?>
    <?php endforeach; ?>
    </section>
    <section class="select">
        <h2 class="heading">
        <?php foreach($a as $b): ?>
            <?php echo $b->name; ?>
        <?php endforeach; ?>
        </h2>
        <div class="dropdown">
            <div class="dropdown-select">
                <span class="select">Sắp Xếp</span>
                <i class="fa fa-caret-down icon"></i>
            </div>
            <div class="dropdown-list">
                <div class="dropdown-list_item"><a href="index.php?controller=products&action=category&id=<?php echo $id ?>&order=priceAsc">Giá tăng dần</a></div>
                <div class="dropdown-list_item"><a href="index.php?controller=products&action=category&id=<?php echo $id ?>&order=priceDesc">Giá giảm dần</a></div>
                <div class="dropdown-list_item"><a href="index.php?controller=products&action=category&id=<?php echo $id ?>&order=nameAsc">Tên A-Z</a></div>
                <div class="dropdown-list_item"><a href="index.php?controller=products&action=category&id=<?php echo $id ?>&order=nameDesc">Tên Z-A</a></div>
            </div>
        </div>
    </section>
    <section class="contentt">
        <span>
        <?php foreach($a as $b): ?>
            <?php echo $b->content; ?>
        <?php endforeach; ?>
        </span>
    </section>
    <section class="products" id="products">
        <div class="box-container">
        <?php foreach($data as $rows): ?>
            <div class="box">
                <div class="sale">
                    <?php if($rows->discount > 0): ?>
                      <span>-<?php echo $rows->discount; ?>%</span>
                      <?php endif; ?>
                </div>
                <img src="assets/upload/products/<?php echo $rows->photo; ?>">
                <h3><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                <div class="price"><?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> vnđ</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-haf-alt"></i>
                </div>
                <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="btn">Mua ngay</a>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    <section class="features" id="features">
        <h1 class="heading"><span>Đặc Trưng</span></h1>
        <div class="box-container">
            <div class="box swiper-slide">
                <img src="images/mp.png" alt="">
                <h3>GIAo HÀNG MIỄN PHÍ</h3>
                <p>Miễn phí giao hàng trong nội thành Hà Nội</p>
                <a href="#" class="btn">Xem thêm</a>
            </div>
            <div class="box swiper-slide">
                <img src="images/km.png" alt="">
                <h3>KHUYẾN MẠI</h3>
                <p>Khuyến mại sản phẩm nếu đơn hàng trên </p>
                <a href="#" class="btn">Xem thêm</a>
            </div>
            <div class="box swiper-slide">
                <img src="images/hoan.png" alt="">
                <h3>HOÀN TRẢ LẠI TIỀN</h3>
                <p>Nếu sản phẩm không đúng miêu tả</p>
                <a href="#" class="btn">Xem thêm</a>
            </div>
        </div>
    </section>