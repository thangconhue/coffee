<?php 
    //load file Layout.php vao day
    $this->fileLayout = "Layout.php";
 ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=users&action=create" class="btn btn-success">Thêm nhân viên</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách nhân viên</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Họ và tên</th>
                    <th>Chức vụ</th>
                    <th>Email</th>
                    <th>password</th>
                    <th style="width:100px;">Sửa</th>
                    <th style="width:100px;">Xoá</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $rows->name; ?></td>
                    <td>
                    <?php if($rows->quyen == 1): ?>
                        <a>admin</a>
                        <?php elseif($rows->quyen == 0): ?>
                        <a>nhân viên</a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->email; ?></td>
                    <td><?php echo $rows->password; ?></td>
                    <td>
                    <?php if($rows->quyen == 1): ?>
                        <a></a>
                        <?php elseif($rows->quyen == 0): ?>
                            <a href="index.php?controller=users&action=update&id=<?php echo $rows->id; ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                        <?php endif; ?>
                        
                    </td>
                    <td>
                        <?php if($rows->quyen == 1): ?>
                        <a></a>
                        <?php elseif($rows->quyen == 0): ?>
                        <a href="index.php?controller=users&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><button type="button" class="btn btn-danger">Xoá</button></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a href="index.php?controller=users&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>