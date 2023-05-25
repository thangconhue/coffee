<?php
  $this->fileLayout = "TrangTrong.php";
 ?>
<section class="dangki">
        <h1 class="heading">Form đăng kí</h1>
        <form method='post' action="index.php?controller=account&action=registerPost">
            <div class="form-group">
                <p>Họ và tên:</p>
                <input type="text" name="name" class="input-control">
            </div>
            <p>Địa chỉ:</p>
            <input type="text" name="address" class="input-control">
            <p>Điện thoại:</p>
            <input type="text" name="phone" class="input-control">
            <p>Tên tài khoản:</p>
            <input type="text" name="email" class="input-control" required>
            <p>Mật khẩu:</p>
            <input type="password" name="password" class="input-control" required="">
            <p>Xác nhận đăng kí</p>
            <input type="submit" class="btn" value="Đăng ký">
            <p>Bạn đã có tài khoản? <a href="index.php?controller=account&action=login" id="d-n">Đăng nhập</a></p>
        </form>
    </section>