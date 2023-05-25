<?php
    //load file Layout.php vao day
    $this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm danh mục sản phẩm</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tên danh mục</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name) ? $record->name : ""; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div  class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh 1</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <div  class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh 2</div>
                <div class="col-md-10">
                    <input type="file" name="anh">
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Nội dung</div>
                <div class="col-md-10">
                    <textarea name="content"></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("content");
                    </script>
                </div>
            </div>
            <select style="display:none;" name="parent_id">
                        <option value="0"></option>

                    </select>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Xác nhận" class="btn btn-success">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>