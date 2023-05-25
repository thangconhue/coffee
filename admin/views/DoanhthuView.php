<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading" style="font-size: 2.2rem;">Doanh thu hôm nay</div>
        <div class="panel-body">
        <div class="row" style="margin-top:5px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Tổng đơn hôm nay:</div>
                <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from orders where date = curdate()");
                        $a = $query->fetchAll();
                        $tong = count($a);
                ?>
                <div class="col-md-10">
                    <div><p style="font-size: 2rem; font-weight: 900; color: black;"><?php echo $tong; ?></p></div>
                </div>
            </div>
        </div>
        <div class="panel-body">
        <div class="row" style="margin-top:-35px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Đơn huỷ:</div>
                <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from orders where status = 4 and date = curdate()");
                        $c = $query->fetchAll();
                        $tb = count($c);
                ?>
                <div class="col-md-10">
                    <div><p style="font-size: 2rem; font-weight: 900; color: red;"><?php echo $tb; ?></p></div>
                </div>
            </div>
        </div>
        <div class="panel-body">
        <div class="row" style="margin-top:-35px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Đơn huỷ:</div>
                <?php
                    $H = $this->modelHuy();
                ?>
                <?php $hhh=0; ?>
                <?php foreach($H as $rows): ?>
                    <?php $hhh+=$rows->price; ?>
                    <?php endforeach; ?>
                <div class="col-md-10">
                    <div><p style="font-size: 2rem; font-weight: 900; color: red;"><?php echo number_format($hhh); ?> vnđ</p></div>
                    
                </div>
            </div>
        </div>
        <div class="panel-body">
        <div class="row" style="margin-top:-35px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Đơn hoàn thành:</div>
                <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from orders where status = 3 and date = curdate()");
                        $b = $query->fetchAll();
                        $ht = count($b);
                ?>
                <div class="col-md-10">
                    <div><p style="font-size: 2rem; font-weight: 900; color: #139999;"><?php echo $ht; ?></p></div>
                </div>
            </div>
        </div>

        <div class="panel-body">
        <div class="row" style="margin-top:-35px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Đơn hoàn thành:</div>
                <?php
                    $Dt = $this->modelTongdt();
                ?>
                <?php $ttt=0; ?>
                <?php foreach($Dt as $rows): ?>
                    <?php $ttt+=$rows->price; ?>
                    <?php endforeach; ?>
                <div class="col-md-10">
                    <div><p style="font-size: 2rem; font-weight: 900; color: #139999;"><?php echo number_format($ttt); ?> vnđ</p></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading" style="font-size: 2.2rem;">Lọc doanh thu</div>
        <div class="panel-body">
        <div class="row" style="margin-top:5px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Từ ngày:</div>
                <div class="col-md-10">
                    <div><input type="date" id="from" value="<?php echo $from; ?>" ></div>
                </div>
            </div>
        </div>
        <div class="panel-body">
        <div class="row" style="margin-top:10px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Đến ngày:</div>
                <div class="col-md-10">
                    <div style=""><input type="date" id="to" value="<?php echo $to; ?>"></div>
                </div>
            </div>
        </div>
        <div class="panel-body">
        <div class="row" style="margin-top:10px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div>
                    <input style="background-color: #c62727;" type="button" class="btn btn-warning" value="Lọc" onclick="location.href = 'index.php?controller=doanhthu&action=doanhthu&from=' + document.getElementById('from').value + '&to=' + document.getElementById('to').value;" />
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
        <div class="row" style="margin-top:10px; align-items: center; font-size: 1.9rem;">
                <div class="col-md-2">Tổng doanh thu:</div>
                <div class="col-md-10">
                    <div><p style="font-size: 2rem; font-weight: 900;">
                    <?php
                    $tongdt = $this->tongdt();
                ?>
                    <?php $tong = 0; ?>
                    <?php foreach($tongdt as $rows): ?>
                        <?php $tong += $rows->price; ?>
                    <?php endforeach; ?>
                    <?php echo number_format($tong); ?> vnđ
                </p></div>
                </div>
            </div>
        </div>
    </div>
</div>