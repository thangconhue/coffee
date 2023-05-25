<?php 
	trait HomeModel{
		//san pham noi bat
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot = 1 order by price desc");
			//tra ve tat ca cac ban ghi truy van duoc
			return $query->fetchAll();
		}
		public function modelBanner(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from banner limit 3");
			//tra ve tat ca cac ban ghi truy van duoc
			return $query->fetchAll();
		}

		public function modelProducts(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot = 0");
			//tra ve tat ca cac ban ghi truy van duoc
			return $query->fetchAll();
		}
		//lay 10 tin noi bat de hien thi o trang chu

	}
 ?>