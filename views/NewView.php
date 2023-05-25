<?php
  $this->fileLayout = "TrangTrong.php";
 ?>
<section class="blogs" id="blogs">
        <div class="box-container">
                    <?php
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from news order by name desc");
                        $news = $query->fetchAll();
                    ?>
                    <?php foreach($news as $rows): ?>
            <div class="box">
            <img src="assets/upload/news/<?php echo $rows->photo; ?>" >
                <div class="content">
                    <div class="icons">
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                        <a href="#"><i class="fas fa-calendar"></i><?php echo date("d/m/Y",strtotime($rows->date)); ?></a>
                    </div>
                    <h3><?php echo $rows->name; ?></h3>
                    <p><?php echo $rows->content; ?></p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>