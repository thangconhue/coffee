<header class="header1" id="header1">
        <!-- <a href="#"><i class="fas fa-map-marker-alt"></i><span>154 cửa hang trên cả nước</span></a> -->
        <a href="#"><i class="fas fa-phone"></i><span>Đặt hàng 0332919399</span></a>
        <a href="#"><i class="fas fa-shipping-fast"></i><span>Free ship khi mua từ 4 đồ uống</span></a>
    </header>
    <header class="header">
        <div>
            <a href="index.php"><img src="img/l.PNG" alt=""></a>
            <a href="index.php" class="logo">AT COFFEE</a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="#">Menu Đồ Uống +</a>
                    <ul>
                    <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from categories order by name asc");
                        $categories = $query->fetchAll();
                    ?>
                        <?php foreach($categories as $rows): ?>
                        <li><a href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="index.php?controller=intro">Giới Thiệu</a></li>
                <li><a href="index.php?controller=new">Tin Tức</a></li>
                <li><a href="index.php?controller=contact">Liên Hệ</a></li>
            </ul>
        </nav>
        <div class="icons">
        <?php 
            $numberProduct = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
          ?>
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn">
                <span><?php echo $numberProduct; ?></span>
            </div>
            <div class="fas fa-user" id="login-btn">
            <?php if(isset($_SESSION['customer_email'])): ?>
                <i class="fas fa-circle"></i>
            <?php endif; ?>
            </div>
        </div>

        <div class="search-form">
            <div class="a">
                <input onkeypress="searchFormm(event);" autocomplete="off" class="searchh" type="search" id="key" placeholder="tìm kiếm...">
                <button type="submit" ><i onclick="return searchhh();" class="fas fa-search"></i></button>
            </div>
            <div class="b">
                <ul>

                </ul>
            </div>
            <script type="text/javascript">
              function searchhh(){
                var key = document.getElementById("key").value;
                location.href = "index.php?controller=search&action=name&key="+key;
              }
              function searchFormm(event){
                if(event.keyCode == 13){
                  var key = document.getElementById("key").value;
                  location.href = "index.php?controller=search&action=name&key="+key;
                }
              }
                 $(".searchh").keyup(function(){
                    var strKey = $("#key").val();
                    if(strKey.trim() == "")
                        $(".b").attr("style","display:none");
                    else{
                        $(".b").attr("style","display:block");
                        //---
                        //su dung ajax de lay du lieu
                        $.get("index.php?controller=search&action=ajaxSearch&key="+strKey,function(data){
                            //clear cac the li ben trong the ul
                            $(".b ul").empty();
                            //them su lieu vua lay duoc bang ajax vao the ul
                            $(".b ul").append(data);
                        });
                    }
                 });
          </script>
        </div>
        
        <div class="shopping-cart">
        <?php if(isset($_SESSION['cart'])): ?>
        <?php foreach($_SESSION['cart'] as $product): ?>
            <div class="box">
            <img alt="<?php echo $product['name']; ?>" src="assets/upload/products/<?php echo $product['photo']; ?>">
                <div class="content">
                    <a href="index.php?controller=products&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                    <span class="price"><?php echo $product['number']; ?> x <?php echo number_format($product['price'] - ($product['price'] * $product['discount'])/100); ?>vnđ</span>
                </div>
                <a href="index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>"><i class="fas fa-trash"></i></a>
            </div>
            <?php endforeach; ?>
            <?php
            $number = 0;
            $total = 0;
                foreach($_SESSION['cart'] as $product){
                    $total += ($product['price']-$product['price']*$product['discount']/100) * $product['number'];
                    $number += $product['number'];
                }
            ?>
            <?php if($number > 3): ?>
                        <?php $ship =0; ?>
                    <?php else: ?>
                        <?php $ship =20000; ?>
                    <?php endif; ?>
            <?php if($total > 0): ?>
            <div class="total"> Tổng tiền : <?php echo number_format($total+$ship); ?> vnđ</div>
            <?php else: ?>
                <div class="total"> Tổng tiền : <?php echo number_format($total); ?> vnđ</div>
                <?php endif; ?>
            <a href="index.php?controller=cart" class="btn">Thanh toán</a>
            <?php else: ?>
            <div class="shopping-cart">
            Giỏ hàng đang trống
            </div>
        <?php endif; ?>
        </div>
        <form method='post' action="index.php?controller=account&action=loginPost" class="login-form">
        <?php if(isset($_SESSION['customer_email'])): ?>
            <h3>Xin chào </h3>
            <p><?php echo $_SESSION['customer_email'] ?></p>
            <a href="index.php?controller=account&action=logout" class="btn">Đăng xuất</a>
            <?php else: ?>
            <h3>Đăng nhập</h3>
            <input name="email" type="email" placeholder="email" class="box">
            <input name="password" type="password" placeholder="mật khẩu" class="box">
            <p>quên mật khẩu <a href="#">Chọn</a></p>
            <p>Bạn đã có tài khoản? <a href="index.php?controller=account&action=register">Đăng kí</a></p>
            <input type="submit" value="Đăng nhập" class="btn">
            <?php endif; ?>
        </form>
    </header>