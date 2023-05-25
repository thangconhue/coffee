<?php
  $this->fileLayout = "TrangChu.php";
 ?>
<section class="products" id="products">
        <h1 class="heading"><span>Đồ uống</span>Mới</h1>
        <?php
            $hotProduct = $this->modelHotProduct();
          ?>
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                <?php foreach($hotProduct as $rows): ?>
                    <div class="box swiper-slide">
                        <div class="sale">
                            <?php if($rows->discount > 0): ?>
                                <span>-<?php echo $rows->discount; ?>%</span>
                            <?php endif; ?>
                        </div>
                        <img src="assets/upload/products/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>">
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
        </div>
        <?php
            $Product = $this->modelProducts();
          ?>
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
            <?php foreach($Product as $rows): ?>
                <div class="box swiper-slide">
                        <div class="sale">
                            <?php if($rows->discount > 0): ?>
                                <span>-<?php echo $rows->discount; ?>%</span>
                            <?php endif; ?>
                        </div>
                        <img src="assets/upload/products/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>">
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
        </div>
    </section>

    <section class="categories" id="categories">
        <h1 class="heading"> Danh mục <span>đồ uống</span></h1>
        
        <div class="box-container">
        <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from categories order by name asc limit 4");
                        $categories = $query->fetchAll();
                    ?>
            <?php foreach($categories as $rows): ?>
                <div class="box">
                <img src="assets/upload/products/<?php echo $rows->anh; ?>" >
                    <h3><?php echo $rows->name; ?></h3>
                    <p>Giảm 5%</p>
                    <a href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>" class="btn">Mua ngay</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="review" id="review">
        <h1 class="heading"><span>Đánh giá</span>khách hàng</h1>
        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="box swiper-slide">
                    <img src="images/ps2.png" alt="">
                    <p>đồ uống ngon</p>
                    <h3>Thắng</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-haf-alt"></i>
                    </div>
                </div>
                <div class="box swiper-slide">
                    <img src="images/ps1.png" alt="">
                    <p>giá cả hợp lí</p>
                    <h3>Cương Ngô</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-haf-alt"></i>
                    </div>
                </div>
                <div class="box swiper-slide">
                    <img src="images/ps2.png" alt="">
                    <p>Đồ uống rất ngon</p>
                    <h3>Ánh Hồng</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-haf-alt"></i>
                    </div>
                </div>
                <div class="box swiper-slide">
                    <img src="images/p3.png" alt="">
                    <p>Tuyệt vời</p>
                    <h3>Hiền</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-haf-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs" id="blogs">
        <h1 class="heading"><span>Nhật kí</span></h1>
        <div class="box-container">
                    <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from news order by name desc");
                        $news = $query->fetchAll();
                    ?>
                    <?php foreach($news as $rows): ?>
            <div class="box">
            <img src="assets/upload/news/<?php echo $rows->photo; ?>" >
                <div class="content">
                    <div class="icons">
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                        <a href="#"><i class="fas fa-calendar"></i><?php echo date("d/m/Y",strtotime($rows->date)); ?></a>
                    </div>
                    <h3><?php echo $rows->name; ?></h3>
                    <p><?php echo $rows->content; ?></p>
                    <a href="#" class="btn">Xem thêm</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>