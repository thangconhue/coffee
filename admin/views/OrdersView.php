<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">
 	<div class="panel panel-primary">
 		<div class="panel-heading">Danh sách đơn hàng</div>
 		<div class="panel-body">
 			<table class="table table-hover table-borderd">
 				<tr>
					<th>Mã đơn hàng</th>
 					<th>Họ và tên</th>
 					<th>Địa chỉ</th>
 					<th>Điện thoại</th>
 					<th>Ngày mua</th>
 					<th>Tổng tiền</th>
 					<th style="width: 150px;">Trạng thái</th>
					 <th style="width: 120px;">Hình thức thanh toán</th>
 					<th style="width:300px;"></th>
 				</tr>
 				<?php foreach($data as $rows): ?>
 				<?php $customer = $this->modelGetCustomer($rows->customer_id); ?>
 				<tr>
				 <td>DH_00<?php echo $rows->id; ?></td>
 					<td><?php echo isset($customer->name)?$customer->name:""; ?></td>
 					<td><?php echo isset($customer->address)?$customer->address:""; ?></td>
 					<td><?php echo isset($customer->phone)?$customer->phone:""; ?></td>
 					<td><?php echo date("d/m/Y",strtotime($rows->date)); ?></td>
 					<td><?php echo number_format($rows->price); ?> vnđ</td>
 					<td>
 						<?php if($rows->status == 1): ?>
 							<div>Đang chuẩn bị hàng</div>
						<?php elseif($rows->status == 2): ?>
 							<div>Đang giao hàng</div>
						<?php elseif($rows->status == 3): ?>
 							<div>Thành công</div>
							 <?php elseif($rows->status == 4): ?>
								<a style="background-color: #b20505; font-size: 12px; padding: 1px 5px 3px 5px; border-radius: 3px; color: white;"class="">Thất bại</a>
 						<?php else: ?>
 							<div>Chưa giao hàng</div>
 						<?php endif; ?>
 					</td>
					 <td>
					<?php if($rows->hinhthuc == 1): ?>
 							<div>Trả bằng tiền mặt</div>
							 <?php else: ?>
 							<div>Chuyển khoản</div>
 						<?php endif; ?>
					</td>
 					<td style="text-align:center;">
 						<?php if($rows->status == 0): ?>
 							<a style="background-color: #00c0ef; font-size: 12px; padding: 1px 5px 3px 5px; border-radius: 3px; color: white;" href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id; ?>" class="">Xác nhận: đơn hàng mới</a>
 							&nbsp;&nbsp;
						<?php elseif($rows->status == 1): ?>
 							<a style="background-color: #dd7c7c; font-size: 12px; padding: 1px 5px 3px 5px; border-radius: 3px; color: white;" href="index.php?controller=orders&action=delivery1&id=<?php echo $rows->id; ?>" class="">Tiến hành giao hàng</a>
 							&nbsp;&nbsp;
						<?php elseif($rows->status == 2): ?>
 							<a style="background-color: #aad4ff; font-size: 12px; padding: 1px 5px 3px 5px; border-radius: 3px; color: white;" href="index.php?controller=orders&action=delivery2&id=<?php echo $rows->id; ?>" class="">Giao hàng thành công</a>
 							&nbsp;&nbsp;
							 <a style="background-color: #b20505; font-size: 12px; padding: 1px 5px 3px 5px; border-radius: 3px; color: white;" href="index.php?controller=orders&action=delivery3&id=<?php echo $rows->id; ?>" class="">Thất bại</a>
 						<?php endif; ?>
 						<a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id; ?>" class="label label-success">Chi tiết</a>
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
                <li class="page-item"><a href="index.php?controller=orders&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
 		</div>
 	</div>
 </div>