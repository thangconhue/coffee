<?php 
  //load file LayoutTrangTrong.php vao day
  $this->fileLayout = "TrangTrong.php";
 ?>
    <section class="products" id="products" style="padding-top: 13rem;">
    <h1 style="text-align: center; font-size: 2.5rem; margin: 20px 0; font-family: 'SF Pro Text', sans-serif;">Từ khoá : 
          <?php if(isset($_GET['key'])): ?>
          <?php echo $_GET['key']; ?>
          <?php endif; ?>
      </h1>
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