<?php
  $this->fileLayout = "TrangTrong.php";
 ?>
<section class="dangki">
        <h1 class="heading">Form đăng nhập</h1>
        <form method='post' action="index.php?controller=account&action=loginPost">
            <p>Tên tài khoản:</p>
            <input type="text" name="email" class="input-control" required>
            <p>Mật khẩu:</p>
            <input type="password" name="password" class="input-control" required="">
            <p>Xác nhận đăng nhập</p>
            <input type="submit" class="btn" value="Đăng Nhập">
            <p>Bạn đã có tài khoản? <a href="index.php?controller=account&action=register" id="d-n">Đăng kí</a></p>
        </form>
    </section>