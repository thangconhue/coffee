<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=ncc&action=create" class="btn btn-success">Thêm hoặc sửa nhà cung cấp</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách nhà cung cấp</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width:150px;">Tên nhà cung cấp</th>
                    <th>Mặt hàng cung cấp</th>
                    <th>Ảnh</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th style="width:100px;">Sửa</th>
                    <th style="width:100px;">Xoá</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                <td><?php echo $rows->name; ?></td>
                <td><?php echo $rows->content; ?></td>
                    <td>
                        <?php if($rows->photo != "" && file_exists("../assets/upload/ncc/".$rows->photo)): ?>
                            <img src="../assets/upload/ncc/<?php echo $rows->photo; ?>" style="max-width: 100px;">
                        <?php endif; ?>
                    </td>

                    <td><?php echo $rows->email; ?></td>
                    <td><?php echo $rows->phone; ?></td>
                    <td><?php echo $rows->address; ?></td>
                    
                    <td>
                        <a href="index.php?controller=ncc&action=update&id=<?php echo $rows->id; ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                    </td>
                    <td>
                        <a href="index.php?controller=ncc&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><button type="button" class="btn btn-danger">Xoá</button></a>
                    </td>
                </tr>
            	<?php endforeach; ?>
            </table>
           <!--  <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
            	<li class="page-item"><a href="#" class="page-link">Trang</a></li>
            	<?php for($i = 1; $i <= $numPage; $i++): ?>
            		<li class="page-item"><a href="index.php?controller=ncc&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            	<?php endfor; ?>
            </ul> -->
        </div>
    </div>
</div>