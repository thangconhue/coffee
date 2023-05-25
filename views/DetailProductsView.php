<?php
  $this->fileLayout = "TrangTrong.php";
 ?>
     <section class="chitiet">
        <a href="">Danh Mục</a> / <a href="">Sản Phẩm</a> / <a href=""> <?php echo $record->name; ?> </a>
        <div class="box-container">
            <div class="box">
            <img src="assets/upload/products/<?php echo $record->photo; ?>"/>
            </div>
            <div class="box" style="display: flex; flex-direction: column;">
                <h3><?php echo $record->name; ?></h3>
                <span><?php echo number_format($record->price - ($record->price * $record->discount)/100); ?> VNĐ</span>
                <p>chọn size</p>
                    <div><a href="">Nhỏ</a><a href="">vừa</a><a href="">lớn</a></div>
                
                <a id="aa" href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>"><i class="fas fa-motorcycle"></i>  Đặt giao tận nơi</a>
            </div>
        </div>
        <div class="mota">
            <h3>Mô tả sản phẩm</h3>
            <?php echo $record->description; ?>
        </div>
        <div class="lienquan">
            <h3>Sản phẩm liên quan</h3>
            <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from products order by rand() limit 6");
                        $lq = $query->fetchAll();
                    ?>
            <div class="box-container">
            <?php foreach($lq as $rows): ?>
                <div class="box">
                <img src="assets/upload/products/<?php echo $rows->photo; ?>"/>
                    <div class="nd">
                        <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
                        <span ><?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> VNĐ</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>