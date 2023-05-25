<?php
  $this->fileLayout = "TrangTrong.php";
 ?>
  <?php if(isset($_GET["notify"]) && $_GET["notify"] = "order-success"): ?>
 <script type="text/javascript">
 	alert("Mua hàng thành công");
 	location.href='index.php?controller=cart';
 </script>
<?php endif; ?>
<section class="giohang">
        <h1 class="heading">Giỏ hàng của bạn</h1>
        <form action="index.php?controller=cart&action=update" method="post">
            <div class="list-thanhtoan">
            <?php foreach($_SESSION['cart'] as $product): ?>
                <div class="pr-list">
                    <div class="pr-image">
                    <img src="assets/upload/products/<?php echo $product['photo']; ?>" />
                    </div>
                    <div class="pr-decription">
                        <div class="pr-dc-name">
                            <p><?php echo $product['name']; ?></p>
                        </div>
                        <div class="pr-price">

                            <p><?php echo number_format(($product["price"]-($product["price"]*$product["discount"])/100)*$product["number"]); ?> vnđ</p>
                        </div>
                        <div class="so-luong">
                            <p>Số lượng</p>
                            <div class="d-u">
                                <!-- <button>-</button> -->
                                <input type="number" min="1" max="30" value="<?php echo $product['number']; ?>" name="product_<?php echo $product['id']; ?>">
                                <!-- <button>+</button> -->
                            </div>
                        </div>
                    </div>
                    <a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>"><i class="fas fa-trash"></i></a>
                </div>
                <?php endforeach; ?> 
                <div class="tinh-tong">

                </div>
            </div>
            <?php if($this->cartNumber() > 0): ?>
            <div class="thanhtoan">
                <div class="each-row"><h3>Tổng cộng</h3></div>
                <div class="each-row">
                    <p>Tạm Tính:</p>
                    <?php if($this->cartNumber() > 3): ?>
                        <?php $ship =0; ?>
                    <?php else: ?>
                        <?php $ship =20000; ?>
                    <?php endif; ?>
                    <p><?php echo number_format($this->cartTotal()-$ship); ?> vnđ</p>
                </div>
                <div class="each-row">
                    <p>Chiết khấu:</p>
                    <p>- 0 vnđ</p>
                </div>
                <div class="each-row">
                    <p>Phí ship:</p>
                    <?php if($this->cartNumber() > 3): ?>
                    <?php $ship =0; ?>
                    <p><?php echo $ship; ?> vnđ</p>
                    <?php else: ?>
                    <?php $ship =20000; ?>
                    <p><?php echo number_format($ship); ?> vnđ</p>
                    <?php endif; ?>
                </div>
                <div class="each-row">
                    
                    <p>Cần thanh toán:</p>
                    <p style="color: #f58560;"><?php echo number_format($this->cartTotal()); ?> vnđ</p>
                </div>
                <input style="margin-bottom: 20px;" class="cn" type="submit" value="Cập nhật">
            </div>
            <?php endif; ?>
        </form>
        <?php if($this->cartNumber() > 0): ?>
            <form action="index.php?controller=cart&action=checkout" method="post">
            <div class="pthuc">
                <div><h3>Phương thức thanh toán</h3></div>
                <div class="ttt"><input type="checkbox" name="ht1"  id="myCheck0" onclick="myFunction1()"><p>Thanh toán khi nhận hàng</p></div>
                <div class="ttt zzz"><input type="checkbox" name="ht2"  id="myCheck" onclick="myFunction2()">
                
                    <p>Thanh toán chuyển khoản</p>
                </div>
                <div id="text" style="display: none;"><img style=" height: 30rem;" src="images/ttt.jpg" alt=""></div>
            </div>
            <input class="btn" type="submit" value="Đặt hàng">
        </form>
        <?php endif; ?>
    </section>