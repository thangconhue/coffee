<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=news&action=create" class="btn btn-success">Thêm hoặc sửa tin tức</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách tin tức</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width:100px;">Ảnh</th>
                    <th>Tên</th>
                    <th>Nội dung</th>
                    <th style="width:100px;">Sửa</th>
                    <th style="width:100px;">Xoá</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td>
                        <?php if($rows->photo != "" && file_exists("../assets/upload/news/".$rows->photo)): ?>
                            <img src="../assets/upload/news/<?php echo $rows->photo; ?>" style="max-width: 100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->content; ?></td>
                    <td>
                        <a href="index.php?controller=news&action=update&id=<?php echo $rows->id; ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                    </td>
                    <td>
                        <a href="index.php?controller=news&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><button type="button" class="btn btn-danger">Xoá</button></a>
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
            		<li class="page-item"><a href="index.php?controller=news&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            	<?php endfor; ?>
            </ul> -->
        </div>
    </div>
</div>