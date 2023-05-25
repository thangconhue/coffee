<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include "views/Header.php"; ?>
		<?php
            $banner = $this->modelBanner();
          ?>
    <div class="slider" id="slider">
		<!-- fade css -->
		<?php foreach($banner as $rows): ?>
		<div class="myslide fade">
		<div class="txt">
				<h1><?php echo $rows->name; ?></h1>
				<p><?php echo $rows->content; ?><?php echo $rows->description; ?></p>
			</div>
			<img style="width: 100%; height: 100%;" src="assets/upload/banner/<?php echo $rows->photo; ?>" >
		</div>
		<?php endforeach; ?>
		<!-- /fade css -->
		
		<!-- onclick js -->
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		
		<div class="dotsbox" style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
			<span class="dot" onclick="currentSlide(3)"></span>
		</div>
		<!-- /onclick js -->
	</div>
    <?php echo $this->view; ?>
    <?php include "views/Footer.php"; ?>
    <div class="scroll-top">
        <a href="#slider"><i id="cv_bot" class="fas fa-chevron-up" style="color:black;"></i>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>