<?php 
    //load file Layout.php vao day
    $this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">  
    <?php if(isset($_GET["notify"]) && $_GET["notify"] == "email-exists"): ?>
        <div class="alert alert-warning">Email đã tồn tại</div>
    <?php endif; ?>
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm hoặc xoá nhân viên</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Họ và tên</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name) ? $record->name : ""; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Email</div>
                <div class="col-md-10">
                    <input type="email" value="<?php echo isset($record->email) ? $record->email : ""; ?>" <?php if(isset($record->email)): ?> disabled <?php else: ?> required <?php endif; ?> name="email" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Password</div>
                <div class="col-md-10">
                    <input type="password" name="password" <?php if(isset($record->email)): ?> placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" <?php else: ?> required <?php endif; ?> class="form-control">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-success">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>